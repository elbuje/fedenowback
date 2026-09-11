<?php
/**
 * Configuración Central - Fede Nowback
 * Dominio: https://fedenowback.com.ar
 * Marca Personal, Eventos, Campus y Comunidad
 */

// Detección automática de protocolo y host
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
$host = $_SERVER['HTTP_HOST'] ?? 'fedenowback.com.ar';
define('SITE_URL', rtrim($protocol . $host, '/'));
define('SITE_NAME', 'Fede Nowback');
define('SITE_TAGLINE', 'Mentor de Creadores · Estratega de Contenidos · Speaker');
define('SITE_PHONE', '+54 9 11 3820-5570');
define('SITE_PHONE_RAW', '5491138205570');
define('SITE_EMAIL', 'contacto@fedenowback.com.ar');
define('SITE_INSTAGRAM', '@fedenowback');
define('SITE_YOUTUBE', 'https://www.youtube.com/@fedenowback6170');

/**
 * Generador de enlace WhatsApp con mensaje codificado
 */
function get_whatsapp_url($message = '') {
    if (empty($message)) {
        $message = "Hola Fede! Me comunico desde tu sitio web para consultar.";
    }
    return "https://wa.me/" . SITE_PHONE_RAW . "?text=" . urlencode($message);
}
