<?php
/**
 * SMTP Mailer Module — Fede Nowback
 * Pure PHP lightweight socket-based SMTP client with SSL/TLS authentication.
 * Compatible with Hostinger Mail, Google Workspace, etc.
 */

// SMTP Configuration Defaults (Hostinger Mail)
if (!defined('SMTP_HOST')) define('SMTP_HOST', getenv('SMTP_HOST') ?: 'smtp.hostinger.com');
if (!defined('SMTP_PORT')) define('SMTP_PORT', (int)(getenv('SMTP_PORT') ?: 465));
if (!defined('SMTP_USER')) define('SMTP_USER', getenv('SMTP_USER') ?: 'contacto@fedenowback.com.ar');
if (!defined('SMTP_PASS')) define('SMTP_PASS', getenv('SMTP_PASS') ?: 'Fedemail2026!');
if (!defined('SMTP_SECURE')) define('SMTP_SECURE', getenv('SMTP_SECURE') ?: 'ssl');
if (!defined('SMTP_FROM_EMAIL')) define('SMTP_FROM_EMAIL', getenv('SMTP_FROM_EMAIL') ?: 'contacto@fedenowback.com.ar');
if (!defined('SMTP_FROM_NAME')) define('SMTP_FROM_NAME', getenv('SMTP_FROM_NAME') ?: 'Fede Nowback');

/**
 * Send an email via SMTP
 * 
 * @param string $to Recipient email
 * @param string $subject Email subject
 * @param string $htmlBody HTML content
 * @param string $altBody Plain text alternative
 * @param array $options Optional overrides (host, port, user, pass, secure, from_email, from_name, reply_to)
 * @return array ['success' => bool, 'error' => string]
 */
function fede_send_smtp_email($to, $subject, $htmlBody, $altBody = '', $options = []) {
    $to = trim($to);
    if (empty($to) || !filter_var($to, FILTER_VALIDATE_EMAIL)) {
        return ['success' => false, 'error' => 'Dirección de correo no válida: ' . $to];
    }

    $host = $options['host'] ?? SMTP_HOST;
    $port = (int)($options['port'] ?? SMTP_PORT);
    $user = $options['user'] ?? SMTP_USER;
    $pass = $options['pass'] ?? SMTP_PASS;
    $secure = strtolower($options['secure'] ?? SMTP_SECURE);
    $fromEmail = $options['from_email'] ?? SMTP_FROM_EMAIL;
    $fromName = $options['from_name'] ?? SMTP_FROM_NAME;
    $replyTo = $options['reply_to'] ?? $fromEmail;

    $timeout = 10;
    $socketHost = ($secure === 'ssl') ? "ssl://{$host}" : $host;

    $context = stream_context_create([
        'ssl' => [
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        ]
    ]);

    $socket = @stream_socket_client($socketHost . ':' . $port, $errno, $errstr, $timeout, STREAM_CLIENT_CONNECT, $context);
    if (!$socket) {
        $errorMsg = "Error conectando al servidor SMTP ({$socketHost}:{$port}): {$errstr} ({$errno})";
        error_log($errorMsg);
        return ['success' => false, 'error' => $errorMsg];
    }

    stream_set_timeout($socket, $timeout);

    $readResponse = function($expectedCode = null) use ($socket) {
        $response = '';
        while (!feof($socket)) {
            $line = fgets($socket, 1024);
            if ($line === false) break;
            $response .= $line;
            // RFC 5321: If 4th char is space or newline, it's the last line of the multi-line response
            if (preg_match('/^\d{3}( |\r\n|\n)/', $line)) {
                break;
            }
        }
        $code = (int)substr($response, 0, 3);
        if ($expectedCode !== null && $code !== (int)$expectedCode) {
            return ['ok' => false, 'code' => $code, 'response' => trim($response)];
        }
        return ['ok' => true, 'code' => $code, 'response' => trim($response)];
    };

    $sendCommand = function($cmd, $expectedCode = null) use ($socket, $readResponse) {
        fputs($socket, $cmd . "\r\n");
        return $readResponse($expectedCode);
    };

    // 1. Initial Greeting (220)
    $res = $readResponse(220);
    if (!$res['ok']) {
        fclose($socket);
        return ['success' => false, 'error' => 'Saludo inicial SMTP inválido: ' . $res['response']];
    }

    // 2. EHLO
    $clientHost = $_SERVER['SERVER_NAME'] ?? 'fedenowback.com.ar';
    $res = $sendCommand("EHLO {$clientHost}", 250);
    if (!$res['ok']) {
        $res = $sendCommand("HELO {$clientHost}", 250);
        if (!$res['ok']) {
            fclose($socket);
            return ['success' => false, 'error' => 'Fallo en EHLO/HELO: ' . $res['response']];
        }
    }

    // 3. STARTTLS if configured as TLS on port 587
    if ($secure === 'tls') {
        $res = $sendCommand("STARTTLS", 220);
        if ($res['ok']) {
            stream_socket_enable_crypto($socket, true, STREAM_CRYPTO_METHOD_TLS_CLIENT);
            $sendCommand("EHLO {$clientHost}", 250);
        }
    }

    // 4. AUTH LOGIN
    if (!empty($user) && !empty($pass)) {
        $res = $sendCommand("AUTH LOGIN", 334);
        if (!$res['ok']) {
            fclose($socket);
            return ['success' => false, 'error' => 'AUTH LOGIN rechazado: ' . $res['response']];
        }

        $res = $sendCommand(base64_encode($user), 334);
        if (!$res['ok']) {
            fclose($socket);
            return ['success' => false, 'error' => 'Usuario SMTP rechazado: ' . $res['response']];
        }

        $res = $sendCommand(base64_encode($pass), 235);
        if (!$res['ok']) {
            fclose($socket);
            return ['success' => false, 'error' => 'Contraseña SMTP rechazada para ' . $user . ': ' . $res['response']];
        }
    }

    // 5. MAIL FROM
    $res = $sendCommand("MAIL FROM:<{$fromEmail}>", 250);
    if (!$res['ok']) {
        fclose($socket);
        return ['success' => false, 'error' => 'MAIL FROM rechazado: ' . $res['response']];
    }

    // 6. RCPT TO
    $res = $sendCommand("RCPT TO:<{$to}>", 250);
    if (!$res['ok']) {
        fclose($socket);
        return ['success' => false, 'error' => 'RCPT TO rechazado: ' . $res['response']];
    }

    // 7. DATA
    $res = $sendCommand("DATA", 354);
    if (!$res['ok']) {
        fclose($socket);
        return ['success' => false, 'error' => 'DATA rechazado: ' . $res['response']];
    }

    // Build MIME Headers and multipart body
    $boundary = '=_fede_' . md5(uniqid(microtime(), true));
    $encodedSubject = '=?UTF-8?B?' . base64_encode($subject) . '?=';
    $encodedFromName = '=?UTF-8?B?' . base64_encode($fromName) . '?=';

    $headers = [];
    $headers[] = "Date: " . date('r');
    $headers[] = "To: <{$to}>";
    $headers[] = "From: {$encodedFromName} <{$fromEmail}>";
    $headers[] = "Reply-To: <{$replyTo}>";
    $headers[] = "Subject: {$encodedSubject}";
    $headers[] = "Message-ID: <" . md5(uniqid(microtime(), true)) . "@" . ($host ?: 'fedenowback.com.ar') . ">";
    $headers[] = "X-Mailer: FedeNowback Engine 2.0";
    $headers[] = "MIME-Version: 1.0";
    $headers[] = "Content-Type: multipart/alternative; boundary=\"{$boundary}\"";

    $plainContent = !empty($altBody) ? $altBody : strip_tags(str_replace(['<br>', '<br/>', '<br />', '</p>'], "\n", $htmlBody));

    $body = "--{$boundary}\r\n";
    $body .= "Content-Type: text/plain; charset=UTF-8\r\n";
    $body .= "Content-Transfer-Encoding: base64\r\n\r\n";
    $body .= chunk_split(base64_encode($plainContent)) . "\r\n";

    $body .= "--{$boundary}\r\n";
    $body .= "Content-Type: text/html; charset=UTF-8\r\n";
    $body .= "Content-Transfer-Encoding: base64\r\n\r\n";
    $body .= chunk_split(base64_encode($htmlBody)) . "\r\n";
    $body .= "--{$boundary}--\r\n";

    $messageData = implode("\r\n", $headers) . "\r\n\r\n" . $body . "\r\n.\r\n";

    fputs($socket, $messageData);
    $res = $readResponse(250);
    if (!$res['ok']) {
        fclose($socket);
        return ['success' => false, 'error' => 'Fallo al despachar contenido: ' . $res['response']];
    }

    // 8. QUIT
    $sendCommand("QUIT");
    fclose($socket);

    return ['success' => true, 'message' => 'Correo enviado exitosamente a ' . $to];
}
