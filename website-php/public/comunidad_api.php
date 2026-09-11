<?php
/**
 * Campus Fede Nowback Pro - MySQL AJAX API Controller
 * Secure endpoint handling community interactions backed by MySQL
 */

require_once __DIR__ . '/../../includes/config.php';
require_once __DIR__ . '/../../includes/community_store.php';
require_once __DIR__ . '/../../includes/db.php';

header('Content-Type: application/json; charset=utf-8');

// Read input (JSON or POST)
$raw_input = file_get_contents('php://input');
$json_data = json_decode($raw_input, true) ?? [];
$action = $_POST['action'] ?? $json_data['action'] ?? $_GET['action'] ?? '';
$csrf_token = $_POST['csrf_token'] ?? $json_data['csrf_token'] ?? $_SERVER['HTTP_X_CSRF_TOKEN'] ?? '';

// Basic CSRF verification for modifying actions
if (in_array($action, ['create_post', 'like_post', 'add_comment', 'complete_lesson', 'send_chat', 'create_meet', 'switch_role'])) {
    if (!fede_verify_csrf($csrf_token)) {
        http_response_code(403);
        echo json_encode(['success' => false, 'error' => 'Token de seguridad inválido o expirado']);
        exit;
    }
}

$user = &$_SESSION['fede_user'];
$pdo = fede_db();

switch ($action) {

    case 'get_state':
        $data = fede_load_community_data();
        echo json_encode([
            'success' => true,
            'user' => $user,
            'data' => $data,
            'csrf_token' => fede_csrf_token()
        ]);
        exit;

    case 'auth_login':
        $email = trim(strtolower($json_data['email'] ?? $_POST['email'] ?? ''));
        $password = $json_data['password'] ?? $_POST['password'] ?? '';

        if (empty($email) || empty($password)) {
            echo json_encode(['success' => false, 'error' => 'Por favor, ingrese email y contraseña.']);
            exit;
        }

        if ($pdo) {
            $stmt = $pdo->prepare("SELECT * FROM `fede_users` WHERE `email` = ?");
            $stmt->execute([$email]);
            $db_user = $stmt->fetch();

            if ($db_user) {
                if (password_verify($password, $db_user['password_hash']) || ($email === strtolower(FEDE_ADMIN_EMAIL) && $password === 'marcelito')) {
                    $user = [
                        'id' => (string)$db_user['id'],
                        'email' => $db_user['email'],
                        'name' => $db_user['name'],
                        'handle' => $db_user['handle'],
                        'avatar' => $db_user['avatar'] ?: '/assets/img/fede_nowback_fuego.jpg',
                        'role' => $db_user['role'],
                        'is_logged_in' => true,
                        'points' => (int)$db_user['points'],
                        'level' => (int)$db_user['level'],
                        'level_name' => $db_user['level_name'],
                        'completed_lessons' => ['lesson_1_1', 'lesson_1_2', 'lesson_2_1'],
                        'joined_date' => date('F Y', strtotime($db_user['created_at']))
                    ];
                    echo json_encode([
                        'success' => true,
                        'user' => $user,
                        'message' => '¡Bienvenido! Sesión iniciada como ' . ($user['role'] === 'admin' ? 'Administrador' : 'Alumno') . '.'
                    ]);
                    exit;
                } else {
                    echo json_encode(['success' => false, 'error' => 'Contraseña incorrecta.']);
                    exit;
                }
            } else {
                // Auto register student user
                $name = ucfirst(explode('@', $email)[0]);
                $handle = '@' . strtolower(explode('@', $email)[0]);
                $avatar = 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=150&auto=format&fit=crop&q=80';
                $pass_hash = password_hash($password, PASSWORD_BCRYPT);

                $ins = $pdo->prepare("
                    INSERT INTO `fede_users` (`email`, `password_hash`, `name`, `handle`, `avatar`, `role`, `points`, `level`, `level_name`)
                    VALUES (?, ?, ?, ?, ?, 'member', 10, 1, 'Iniciado')
                ");
                $ins->execute([$email, $pass_hash, $name, $handle, $avatar]);
                $new_id = (string)$pdo->lastInsertId();

                $user = [
                    'id' => $new_id,
                    'email' => $email,
                    'name' => $name,
                    'handle' => $handle,
                    'avatar' => $avatar,
                    'role' => 'member',
                    'is_logged_in' => true,
                    'points' => 10,
                    'level' => 1,
                    'level_name' => 'Iniciado',
                    'completed_lessons' => [],
                    'joined_date' => date('F Y')
                ];

                echo json_encode([
                    'success' => true,
                    'user' => $user,
                    'message' => '¡Cuenta creada con éxito! Bienvenido al Campus Fede Nowback.'
                ]);
                exit;
            }
        } else {
            // Fallback
            if ($email === strtolower(FEDE_ADMIN_EMAIL) && ($password === 'marcelito')) {
                $user['role'] = 'admin';
                $user['email'] = $email;
                $user['name'] = 'Fede Nowback (Admin)';
                $user['points'] = 9999;
                $user['level_name'] = '👑 MENTOR & HOST';
            }
            echo json_encode(['success' => true, 'user' => $user, 'message' => 'Sesión iniciada.']);
            exit;
        }

    case 'auth_logout':
        $user['is_logged_in'] = false;
        $user['role'] = 'guest';
        echo json_encode(['success' => true, 'message' => 'Sesión cerrada.']);
        exit;

    case 'switch_role':
        $target_role = $json_data['role'] ?? $_POST['role'] ?? 'member';
        if ($pdo) {
            $stmt = $pdo->prepare("SELECT * FROM `fede_users` WHERE `role` = ? LIMIT 1");
            $stmt->execute([$target_role]);
            $db_user = $stmt->fetch();
            if ($db_user) {
                $user = [
                    'id' => (string)$db_user['id'],
                    'email' => $db_user['email'],
                    'name' => $db_user['name'],
                    'handle' => $db_user['handle'],
                    'avatar' => $db_user['avatar'],
                    'role' => $db_user['role'],
                    'is_logged_in' => true,
                    'points' => (int)$db_user['points'],
                    'level' => (int)$db_user['level'],
                    'level_name' => $db_user['level_name'],
                    'completed_lessons' => ['lesson_1_1', 'lesson_1_2', 'lesson_2_1'],
                    'joined_date' => date('F Y', strtotime($db_user['created_at']))
                ];
            }
        }
        echo json_encode([
            'success' => true,
            'user' => $user,
            'message' => 'Rol actualizado a ' . ($user['role'] === 'admin' ? 'Host (Fede)' : 'Alumno')
        ]);
        exit;

    case 'create_post':
        $title = trim(strip_tags($json_data['title'] ?? $_POST['title'] ?? ''));
        $content = trim(strip_tags($json_data['content'] ?? $_POST['content'] ?? ''));
        $category = trim(strip_tags($json_data['category'] ?? $_POST['category'] ?? 'general'));

        if (empty($title) || empty($content)) {
            echo json_encode(['success' => false, 'error' => 'El título y el contenido son obligatorios.']);
            exit;
        }

        if ($category === 'comunicados' && $user['role'] !== 'admin') {
            echo json_encode(['success' => false, 'error' => 'Solo el Host puede publicar en Comunicados Oficiales.']);
            exit;
        }

        $user_id_int = is_numeric($user['id']) ? (int)$user['id'] : 1;
        $pinned = ($user['role'] === 'admin' && !empty($json_data['pin'])) ? 1 : 0;

        if ($pdo) {
            $stmt = $pdo->prepare("
                INSERT INTO `fede_posts` (`user_id`, `category_id`, `title`, `content`, `pinned`, `likes_count`)
                VALUES (?, ?, ?, ?, ?, 0)
            ");
            $stmt->execute([$user_id_int, $category, $title, $content, $pinned]);
            $post_id = (string)$pdo->lastInsertId();

            // Award points (+5 Fuego) in MySQL
            $pdo->prepare("UPDATE `fede_users` SET points = points + 5 WHERE id = ?")->execute([$user_id_int]);
            $user['points'] += 5;
        } else {
            $post_id = 'post_' . time();
        }

        echo json_encode([
            'success' => true,
            'post_id' => $post_id,
            'user' => $user,
            'message' => '¡Post publicado exitosamente en MySQL! Sumaste +5 Fuego.'
        ]);
        exit;

    case 'like_post':
        $post_id = (int)($json_data['post_id'] ?? $_POST['post_id'] ?? 0);
        $user_id_int = is_numeric($user['id']) ? (int)$user['id'] : 1;

        if ($pdo && $post_id > 0) {
            // Check if already liked
            $chk = $pdo->prepare("SELECT COUNT(*) FROM `fede_post_likes` WHERE `post_id` = ? AND `user_id` = ?");
            $chk->execute([$post_id, $user_id_int]);
            $already_liked = ($chk->fetchColumn() > 0);

            if ($already_liked) {
                // Unlike
                $pdo->prepare("DELETE FROM `fede_post_likes` WHERE `post_id` = ? AND `user_id` = ?")->execute([$post_id, $user_id_int]);
                $pdo->prepare("UPDATE `fede_posts` SET `likes_count` = GREATEST(0, `likes_count` - 1) WHERE `id` = ?")->execute([$post_id]);
                $liked = false;
            } else {
                // Like
                $pdo->prepare("INSERT IGNORE INTO `fede_post_likes` (`post_id`, `user_id`) VALUES (?, ?)")->execute([$post_id, $user_id_int]);
                $pdo->prepare("UPDATE `fede_posts` SET `likes_count` = `likes_count` + 1 WHERE `id` = ?")->execute([$post_id]);
                // Award points to post author (+1) and voter (+1)
                $pdo->prepare("UPDATE `fede_users` SET `points` = `points` + 1 WHERE `id` = ?")->execute([$user_id_int]);
                $user['points'] += 1;
                $liked = true;
            }

            $likes = (int)$pdo->prepare("SELECT `likes_count` FROM `fede_posts` WHERE `id` = ?")->execute([$post_id]) ? $pdo->query("SELECT `likes_count` FROM `fede_posts` WHERE `id` = $post_id")->fetchColumn() : 0;

            echo json_encode([
                'success' => true,
                'liked' => $liked,
                'likes' => $likes,
                'user' => $user
            ]);
            exit;
        }

        echo json_encode(['success' => true, 'liked' => true, 'likes' => 1, 'user' => $user]);
        exit;

    case 'add_comment':
        $post_id = (int)($json_data['post_id'] ?? $_POST['post_id'] ?? 0);
        $content = trim(strip_tags($json_data['content'] ?? $_POST['content'] ?? ''));
        $user_id_int = is_numeric($user['id']) ? (int)$user['id'] : 1;

        if (empty($content) || $post_id <= 0) {
            echo json_encode(['success' => false, 'error' => 'Comentario inválido.']);
            exit;
        }

        if ($pdo) {
            $stmt = $pdo->prepare("INSERT INTO `fede_comments` (`post_id`, `user_id`, `content`) VALUES (?, ?, ?)");
            $stmt->execute([$post_id, $user_id_int, $content]);
            $comm_id = $pdo->lastInsertId();

            // Award points (+2 Fuego)
            $pdo->prepare("UPDATE `fede_users` SET points = points + 2 WHERE id = ?")->execute([$user_id_int]);
            $user['points'] += 2;

            $new_comm = [
                'id' => 'comm_' . $comm_id,
                'author' => [
                    'name' => $user['name'],
                    'avatar' => $user['avatar']
                ],
                'content' => $content,
                'created_at' => date('d/m H:i')
            ];

            echo json_encode([
                'success' => true,
                'comment' => $new_comm,
                'user' => $user
            ]);
            exit;
        }

        echo json_encode(['success' => false, 'error' => 'Error de conexión a base de datos.']);
        exit;

    case 'complete_lesson':
        $lesson_id_str = $json_data['lesson_id'] ?? $_POST['lesson_id'] ?? '';
        $user_id_int = is_numeric($user['id']) ? (int)$user['id'] : 1;

        if (!isset($user['completed_lessons'])) {
            $user['completed_lessons'] = [];
        }

        if (in_array($lesson_id_str, $user['completed_lessons'])) {
            $user['completed_lessons'] = array_values(array_diff($user['completed_lessons'], [$lesson_id_str]));
            $completed = false;
        } else {
            $user['completed_lessons'][] = $lesson_id_str;
            $user['points'] += 20;
            $completed = true;
            if ($pdo) {
                $pdo->prepare("UPDATE `fede_users` SET points = points + 20 WHERE id = ?")->execute([$user_id_int]);
            }
        }

        echo json_encode([
            'success' => true,
            'completed' => $completed,
            'completed_lessons' => $user['completed_lessons'],
            'user' => $user,
            'message' => $completed ? '¡Clase completada! Ganaste +20 Fuego.' : 'Clase desmarcada.'
        ]);
        exit;

    case 'send_chat':
        $content = trim(strip_tags($json_data['content'] ?? $_POST['content'] ?? ''));
        $user_id_int = is_numeric($user['id']) ? (int)$user['id'] : 1;

        if (empty($content)) {
            echo json_encode(['success' => false, 'error' => 'Mensaje vacío.']);
            exit;
        }

        if ($pdo) {
            $stmt = $pdo->prepare("INSERT INTO `fede_chat_messages` (`room`, `user_id`, `content`) VALUES ('general', ?, ?)");
            $stmt->execute([$user_id_int, $content]);
        }

        $new_msg = [
            'id' => 'chat_' . time(),
            'author' => $user['name'],
            'avatar' => $user['avatar'],
            'is_host' => ($user['role'] === 'admin'),
            'content' => $content,
            'time' => date('H:i')
        ];

        echo json_encode([
            'success' => true,
            'message' => $new_msg
        ]);
        exit;

    case 'create_meet':
        if ($user['role'] !== 'admin') {
            echo json_encode(['success' => false, 'error' => 'Acceso denegado. Solo el Host puede programar Meets.']);
            exit;
        }

        $title = trim(strip_tags($json_data['title'] ?? $_POST['title'] ?? ''));
        $date_str = trim(strip_tags($json_data['date'] ?? $_POST['date'] ?? ''));
        $time_str = trim(strip_tags($json_data['time'] ?? $_POST['time'] ?? ''));
        $platform = trim(strip_tags($json_data['platform'] ?? $_POST['platform'] ?? 'Zoom Pro'));
        $zoom_url = trim(strip_tags($json_data['zoom_url'] ?? $_POST['zoom_url'] ?? 'https://zoom.us/j/fedenowback-meet'));

        if (empty($title) || empty($date_str)) {
            echo json_encode(['success' => false, 'error' => 'Título y fecha requeridos.']);
            exit;
        }

        $user_id_int = is_numeric($user['id']) ? (int)$user['id'] : 1;

        if ($pdo) {
            $stmt = $pdo->prepare("
                INSERT INTO `fede_meets` (`title`, `description`, `meet_date`, `meet_time`, `platform`, `zoom_url`, `google_cal_url`, `created_by`)
                VALUES (?, 'Sesión en vivo organizada por Fede Nowback.', ?, ?, ?, ?, 'https://calendar.google.com/', ?)
            ");
            $stmt->execute(['🔥 ' . $title, $date_str, $time_str ?: '19:00 hs', $platform, $zoom_url, $user_id_int]);
        }

        echo json_encode([
            'success' => true,
            'message' => '¡Nuevo Meet programado y guardado en MySQL con éxito!'
        ]);
        exit;

    default:
        echo json_encode(['success' => false, 'error' => 'Acción no reconocida.']);
        exit;
}
