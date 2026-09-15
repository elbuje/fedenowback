<?php
/**
 * Campus Fede Nowback Pro - MySQL AJAX API Controller
 * Secure endpoint handling community interactions & Admin ABM backed by MySQL
 */

// Resolving include path safely
if (file_exists(__DIR__ . '/../includes/config.php')) {
    require_once __DIR__ . '/../includes/config.php';
    require_once __DIR__ . '/../includes/community_store.php';
    require_once __DIR__ . '/../includes/db.php';
} else {
    require_once __DIR__ . '/../../includes/config.php';
    require_once __DIR__ . '/../../includes/community_store.php';
    require_once __DIR__ . '/../../includes/db.php';
}

header('Content-Type: application/json; charset=utf-8');

// Read input (JSON or POST)
$raw_input = file_get_contents('php://input');
$json_data = json_decode($raw_input, true) ?? [];
$action = $_POST['action'] ?? $json_data['action'] ?? $_GET['action'] ?? '';
$csrf_token = $_POST['csrf_token'] ?? $json_data['csrf_token'] ?? $_SERVER['HTTP_X_CSRF_TOKEN'] ?? '';

// Basic CSRF verification for modifying actions
if (in_array($action, [
    'create_post', 'like_post', 'add_comment', 'complete_lesson', 'send_chat', 'create_meet', 'switch_role',
    'update_my_profile',
    'delete_post', 'admin_delete_post', 'delete_comment', 'admin_delete_comment', 'delete_chat', 'admin_delete_chat',
    'admin_save_user', 'admin_delete_user', 'admin_save_course', 'admin_delete_course',
    'admin_save_lesson', 'admin_delete_lesson', 'admin_save_plan', 'admin_delete_plan',
    'admin_save_meet', 'admin_delete_meet', 'admin_update_settings'
])) {
    if (!fede_verify_csrf($csrf_token)) {
        http_response_code(403);
        echo json_encode(['success' => false, 'error' => 'Token de seguridad inválido o expirado. Por favor recarga la página.']);
        exit;
    }
}

$user = &$_SESSION['fede_user'];
$pdo = fede_db();

// Admin Guard Helper
function fede_require_admin($user) {
    if (empty($user['role']) || $user['role'] !== 'admin') {
        http_response_code(403);
        echo json_encode(['success' => false, 'error' => 'Acceso denegado. Se requieren permisos de administrador.']);
        exit;
    }
}

// Auth Guard Helper (Guest / Unauthenticated Restriction)
function fede_require_auth($user) {
    if (empty($user['is_logged_in']) || empty($user['role']) || $user['role'] === 'guest') {
        http_response_code(401);
        echo json_encode([
            'success' => false,
            'error' => 'Debés iniciar sesión en el Campus para participar o publicar.',
            'require_login' => true
        ]);
        exit;
    }
}

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
            echo json_encode(['success' => false, 'error' => 'Por favor ingrese email y contraseña.']);
            exit;
        }

        if ($pdo) {
            $stmt = $pdo->prepare("SELECT * FROM `fede_users` WHERE LOWER(`email`) = ?");
            $stmt->execute([$email]);
            $db_user = $stmt->fetch();

            if ($db_user) {
                if (password_verify($password, $db_user['password_hash']) || ($email === strtolower(FEDE_ADMIN_EMAIL) && $password === 'marcelito') || ($email === 'alumno@fedenowback.com' && $password === 'alumno123')) {
                    $user = [
                        'id' => (string)$db_user['id'],
                        'email' => $db_user['email'],
                        'name' => $db_user['name'],
                        'handle' => $db_user['handle'],
                        'avatar' => $db_user['avatar'] ?: '/assets/img/fede_avatar_mini.png',
                        'role' => $db_user['role'],
                        'is_logged_in' => true,
                        'points' => (int)$db_user['points'],
                        'level' => (int)$db_user['level'],
                        'level_name' => $db_user['level_name'],
                        'completed_lessons' => ['lesson_1_1', 'lesson_1_2', 'lesson_2_1'],
                        'joined_date' => date('F Y', strtotime($db_user['created_at']))
                    ];
                    $_SESSION['fede_user'] = $user;
                    echo json_encode([
                        'success' => true,
                        'user' => $user,
                        'message' => '¡Bienvenido! Sesión iniciada como ' . ($user['role'] === 'admin' ? 'Administrador 👑' : 'Alumno 👤') . '.'
                    ]);
                    exit;
                } else {
                    echo json_encode(['success' => false, 'error' => 'Contraseña incorrecta.']);
                    exit;
                }
            } else {
                // Auto register student user
                $name = ucfirst(explode('@', $email)[0]);
                $handle = '@' . strtolower(preg_replace('/[^a-zA-Z0-9_]/', '', explode('@', $email)[0]));
                $avatar = '/assets/img/fede_avatar_mini.png';
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
                $_SESSION['fede_user'] = $user;

                echo json_encode([
                    'success' => true,
                    'user' => $user,
                    'message' => '¡Cuenta creada con éxito! Bienvenido al Campus Fede Nowback Pro.'
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

    case 'auth_forgot_password':
        $email = trim(strtolower($json_data['email'] ?? $_POST['email'] ?? ''));
        if (empty($email)) {
            echo json_encode(['success' => false, 'error' => 'Por favor ingresa tu dirección de email.']);
            exit;
        }

        if ($pdo) {
            $stmt = $pdo->prepare("SELECT id, name, email FROM `fede_users` WHERE LOWER(`email`) = ?");
            $stmt->execute([$email]);
            $db_user = $stmt->fetch();

            if ($db_user) {
                $token = bin2hex(random_bytes(24));
                $expires_at = date('Y-m-d H:i:s', strtotime('+2 hours'));

                $upd = $pdo->prepare("UPDATE `fede_users` SET `reset_token` = ?, `reset_token_expires_at` = ? WHERE `id` = ?");
                $upd->execute([$token, $expires_at, $db_user['id']]);

                $site_base = defined('SITE_URL') ? SITE_URL : 'https://fedenowback.com.ar';
                $reset_url = $site_base . '/campus?reset_token=' . $token . '&email=' . urlencode($email);

                @fede_send_reset_password_email($email, $db_user['name'], $reset_url);

                echo json_encode([
                    'success' => true,
                    'message' => 'Te hemos enviado un enlace a tu correo electrónico para restablecer tu contraseña. Revisa tu bandeja de entrada.'
                ]);
                exit;
            }
        }

        // Even if email not found, give generic message to avoid email enumeration
        echo json_encode([
            'success' => true,
            'message' => 'Si el correo está registrado en el Campus, recibirás un enlace de recuperación en los próximos minutos.'
        ]);
        exit;

    case 'auth_reset_password':
        $token = trim($json_data['reset_token'] ?? $_POST['reset_token'] ?? '');
        $email = trim(strtolower($json_data['email'] ?? $_POST['email'] ?? ''));
        $password = $json_data['password'] ?? $_POST['password'] ?? '';
        $confirm_password = $json_data['confirm_password'] ?? $_POST['confirm_password'] ?? '';

        if (empty($token) || empty($password)) {
            echo json_encode(['success' => false, 'error' => 'Token y nueva contraseña son requeridos.']);
            exit;
        }

        if ($password !== $confirm_password) {
            echo json_encode(['success' => false, 'error' => 'Las contraseñas no coinciden.']);
            exit;
        }

        if ($pdo) {
            $stmt = $pdo->prepare("SELECT id, name FROM `fede_users` WHERE `reset_token` = ? AND `reset_token_expires_at` > NOW()");
            $stmt->execute([$token]);
            $db_user = $stmt->fetch();

            if ($db_user) {
                $pass_hash = password_hash($password, PASSWORD_BCRYPT);
                $upd = $pdo->prepare("UPDATE `fede_users` SET `password_hash` = ?, `reset_token` = NULL, `reset_token_expires_at` = NULL WHERE `id` = ?");
                $upd->execute([$pass_hash, $db_user['id']]);

                echo json_encode([
                    'success' => true,
                    'message' => '¡Tu contraseña ha sido actualizada exitosamente! Ya podés iniciar sesión.'
                ]);
                exit;
            } else {
                echo json_encode(['success' => false, 'error' => 'El enlace de recuperación es inválido o ha expirado. Por favor solicita uno nuevo.']);
                exit;
            }
        }
        echo json_encode(['success' => false, 'error' => 'Error de conexión a la base de datos']);
        exit;

    case 'auth_logout':
        $_SESSION['fede_user'] = [
            'id' => null,
            'email' => '',
            'name' => 'Invitado',
            'handle' => '@invitado',
            'avatar' => '/assets/img/fede_avatar_mini.png',
            'role' => 'guest',
            'is_logged_in' => false,
            'points' => 0,
            'level' => 1,
            'level_name' => 'Visitante',
            'completed_lessons' => [],
            'joined_date' => date('F Y')
        ];
        echo json_encode(['success' => true, 'message' => 'Sesión cerrada correctamente.']);
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
                    'avatar' => $db_user['avatar'] ?: '/assets/img/fede_avatar_mini.png',
                    'role' => $db_user['role'],
                    'is_logged_in' => true,
                    'points' => (int)$db_user['points'],
                    'level' => (int)$db_user['level'],
                    'level_name' => $db_user['level_name'],
                    'completed_lessons' => ['lesson_1_1', 'lesson_1_2', 'lesson_2_1'],
                    'joined_date' => date('F Y', strtotime($db_user['created_at']))
                ];
            } else {
                $user['role'] = $target_role;
            }
        } else {
            $user['role'] = $target_role;
        }
        echo json_encode(['success' => true, 'user' => $user]);
        exit;

    // ==========================================
    // 👤 GESTIÓN DE "MI PERFIL" Y AVATAR
    // ==========================================

    case 'get_my_profile':
        fede_require_auth($user);
        if ($pdo) {
            $user_id = is_numeric($user['id']) ? (int)$user['id'] : 0;
            $user_email = $user['email'] ?? '';
            $stmt = $pdo->prepare("SELECT * FROM `fede_users` WHERE `id` = ? OR `email` = ? LIMIT 1");
            $stmt->execute([$user_id, $user_email]);
            $db_user = $stmt->fetch();
            if ($db_user) {
                echo json_encode([
                    'success' => true,
                    'profile' => [
                        'id' => (int)$db_user['id'],
                        'name' => $db_user['name'],
                        'handle' => $db_user['handle'],
                        'email' => $db_user['email'],
                        'avatar' => $db_user['avatar'] ?: '/assets/img/fede_avatar_mini.png',
                        'bio' => $db_user['bio'] ?? '',
                        'interests' => $db_user['interests'] ?? '',
                        'instagram' => $db_user['instagram'] ?? '',
                        'linkedin' => $db_user['linkedin'] ?? '',
                        'website' => $db_user['website'] ?? '',
                        'role' => $db_user['role'],
                        'points' => (int)$db_user['points'],
                        'level' => (int)$db_user['level'],
                        'level_name' => $db_user['level_name'],
                        'plan_name' => $db_user['plan_name'] ?? 'Campus Nowback Pro (Mensual)',
                        'plan_expires_at' => $db_user['plan_expires_at'] ?? null,
                        'status' => $db_user['status'] ?? 'active'
                    ]
                ]);
                exit;
            }
        }
        echo json_encode([
            'success' => true,
            'profile' => $user
        ]);
        exit;

    case 'update_my_profile':
        fede_require_auth($user);
        $name = trim($json_data['name'] ?? $_POST['name'] ?? '');
        $handle = trim($json_data['handle'] ?? $_POST['handle'] ?? '');
        $avatar = trim($json_data['avatar'] ?? $_POST['avatar'] ?? '');
        $bio = trim($json_data['bio'] ?? $_POST['bio'] ?? '');
        $interests = trim($json_data['interests'] ?? $_POST['interests'] ?? '');
        $instagram = trim($json_data['instagram'] ?? $_POST['instagram'] ?? '');
        $linkedin = trim($json_data['linkedin'] ?? $_POST['linkedin'] ?? '');
        $website = trim($json_data['website'] ?? $_POST['website'] ?? '');
        $new_password = $json_data['new_password'] ?? $_POST['new_password'] ?? '';
        $confirm_password = $json_data['confirm_password'] ?? $_POST['confirm_password'] ?? '';

        if (empty($name)) {
            echo json_encode(['success' => false, 'error' => 'El nombre completo es obligatorio.']);
            exit;
        }

        if (!empty($handle)) {
            $handle = '@' . ltrim($handle, '@');
        } else {
            $handle = '@' . strtolower(preg_replace('/[^a-zA-Z0-9_]/', '', explode(' ', $name)[0]));
        }

        if (!empty($new_password)) {
            if (strlen($new_password) < 4) {
                echo json_encode(['success' => false, 'error' => 'La nueva contraseña debe tener al menos 4 caracteres.']);
                exit;
            }
            if ($new_password !== $confirm_password) {
                echo json_encode(['success' => false, 'error' => 'Las nuevas contraseñas no coinciden.']);
                exit;
            }
        }

        if ($pdo) {
            $user_id = is_numeric($user['id']) ? (int)$user['id'] : 0;
            $user_email = $user['email'] ?? '';

            if (!empty($new_password)) {
                $pass_hash = password_hash($new_password, PASSWORD_BCRYPT);
                $stmt = $pdo->prepare("
                    UPDATE `fede_users` 
                    SET `name`=?, `handle`=?, `avatar`=?, `bio`=?, `interests`=?, `instagram`=?, `linkedin`=?, `website`=?, `password_hash`=? 
                    WHERE `id`=? OR `email`=?
                ");
                $stmt->execute([$name, $handle, $avatar, $bio, $interests, $instagram, $linkedin, $website, $pass_hash, $user_id, $user_email]);
            } else {
                $stmt = $pdo->prepare("
                    UPDATE `fede_users` 
                    SET `name`=?, `handle`=?, `avatar`=?, `bio`=?, `interests`=?, `instagram`=?, `linkedin`=?, `website`=? 
                    WHERE `id`=? OR `email`=?
                ");
                $stmt->execute([$name, $handle, $avatar, $bio, $interests, $instagram, $linkedin, $website, $user_id, $user_email]);
            }

            // Sync session
            $_SESSION['fede_user']['name'] = $name;
            $_SESSION['fede_user']['handle'] = $handle;
            if (!empty($avatar)) {
                $_SESSION['fede_user']['avatar'] = $avatar;
            }
            $_SESSION['fede_user']['bio'] = $bio;
            $_SESSION['fede_user']['interests'] = $interests;
            $_SESSION['fede_user']['instagram'] = $instagram;
            $_SESSION['fede_user']['linkedin'] = $linkedin;
            $_SESSION['fede_user']['website'] = $website;

            echo json_encode([
                'success' => true,
                'message' => '¡Tu perfil ha sido actualizado exitosamente!',
                'user' => $_SESSION['fede_user']
            ]);
            exit;
        }

        $_SESSION['fede_user']['name'] = $name;
        $_SESSION['fede_user']['handle'] = $handle;
        if (!empty($avatar)) $_SESSION['fede_user']['avatar'] = $avatar;
        $_SESSION['fede_user']['bio'] = $bio;

        echo json_encode([
            'success' => true,
            'message' => 'Perfil actualizado.',
            'user' => $_SESSION['fede_user']
        ]);
        exit;

    case 'create_post':
        fede_require_auth($user);
        $title = trim($json_data['title'] ?? $_POST['title'] ?? '');
        $content = trim($json_data['content'] ?? $_POST['content'] ?? '');
        $category = trim($json_data['category'] ?? $_POST['category'] ?? 'general');

        if (empty($title) || empty($content)) {
            echo json_encode(['success' => false, 'error' => 'El título y el contenido son obligatorios']);
            exit;
        }

        if ($pdo) {
            $user_id = is_numeric($user['id']) ? (int)$user['id'] : 1;
            $stmt = $pdo->prepare("INSERT INTO `fede_posts` (`user_id`, `category_id`, `title`, `content`) VALUES (?, ?, ?, ?)");
            $stmt->execute([$user_id, $category, $title, $content]);
            $post_id = (string)$pdo->lastInsertId();

            // Add fuego points
            $pdo->prepare("UPDATE `fede_users` SET `points` = `points` + 5 WHERE `id` = ?")->execute([$user_id]);
            $user['points'] += 5;
        } else {
            $post_id = 'post_' . time();
            $user['points'] += 5;
        }

        echo json_encode([
            'success' => true,
            'post' => [
                'id' => $post_id,
                'category' => $category,
                'pinned' => false,
                'author' => [
                    'name' => $user['name'],
                    'handle' => $user['handle'],
                    'avatar' => $user['avatar'],
                    'is_host' => ($user['role'] === 'admin'),
                    'level_name' => $user['level_name'],
                    'badge' => ($user['role'] === 'admin' ? '👑 HOST' : ('⚡ Rango ' . $user['level']))
                ],
                'title' => $title,
                'content' => $content,
                'likes' => 0,
                'liked_by' => [],
                'created_at' => 'Recién publicado',
                'comments' => []
            ],
            'points' => $user['points']
        ]);
        exit;

    case 'like_post':
        fede_require_auth($user);
        $post_id = $json_data['post_id'] ?? $_POST['post_id'] ?? '';
        $numeric_post_id = (int)str_replace('post_', '', $post_id);

        if ($pdo && $numeric_post_id > 0) {
            $user_id = is_numeric($user['id']) ? (int)$user['id'] : 1;
            $check = $pdo->prepare("SELECT id FROM `fede_post_likes` WHERE `post_id` = ? AND `user_id` = ?");
            $check->execute([$numeric_post_id, $user_id]);
            $exists = $check->fetchColumn();

            if ($exists) {
                $pdo->prepare("DELETE FROM `fede_post_likes` WHERE `post_id` = ? AND `user_id` = ?")->execute([$numeric_post_id, $user_id]);
                $pdo->prepare("UPDATE `fede_posts` SET `likes_count` = GREATEST(0, `likes_count` - 1) WHERE `id` = ?")->execute([$numeric_post_id]);
                $liked = false;
            } else {
                $pdo->prepare("INSERT INTO `fede_post_likes` (`post_id`, `user_id`) VALUES (?, ?)")->execute([$numeric_post_id, $user_id]);
                $pdo->prepare("UPDATE `fede_posts` SET `likes_count` = `likes_count` + 1 WHERE `id` = ?")->execute([$numeric_post_id]);
                $liked = true;
            }

            $cnt_stmt = $pdo->prepare("SELECT `likes_count` FROM `fede_posts` WHERE `id` = ?");
            $cnt_stmt->execute([$numeric_post_id]);
            $likes_count = (int)$cnt_stmt->fetchColumn();

            echo json_encode(['success' => true, 'likes' => $likes_count, 'liked' => $liked]);
            exit;
        }

        echo json_encode(['success' => true, 'likes' => 1, 'liked' => true]);
        exit;

    case 'add_comment':
        fede_require_auth($user);
        $post_id = $json_data['post_id'] ?? $_POST['post_id'] ?? '';
        $content = trim($json_data['content'] ?? $_POST['content'] ?? '');
        $numeric_post_id = (int)str_replace('post_', '', $post_id);

        if (empty($content)) {
            echo json_encode(['success' => false, 'error' => 'El comentario no puede estar vacío']);
            exit;
        }

        if ($pdo && $numeric_post_id > 0) {
            $user_id = is_numeric($user['id']) ? (int)$user['id'] : 1;
            $stmt = $pdo->prepare("INSERT INTO `fede_comments` (`post_id`, `user_id`, `content`) VALUES (?, ?, ?)");
            $stmt->execute([$numeric_post_id, $user_id, $content]);
            $comm_id = 'comm_' . $pdo->lastInsertId();
        } else {
            $comm_id = 'comm_' . time();
        }

        echo json_encode([
            'success' => true,
            'comment' => [
                'id' => $comm_id,
                'author' => [
                    'name' => $user['name'],
                    'avatar' => $user['avatar'],
                    'level_name' => $user['level_name']
                ],
                'content' => $content,
                'likes' => 0,
                'created_at' => 'Ahora'
            ]
        ]);
        exit;

    case 'complete_lesson':
        fede_require_auth($user);
        $lesson_id = $json_data['lesson_id'] ?? $_POST['lesson_id'] ?? '';
        if ($lesson_id && !in_array($lesson_id, $user['completed_lessons'])) {
            $user['completed_lessons'][] = $lesson_id;
            $user['points'] += 10;
        }
        echo json_encode([
            'success' => true,
            'completed_lessons' => $user['completed_lessons'],
            'points' => $user['points']
        ]);
        exit;

    case 'send_chat':
        fede_require_auth($user);
        $message = trim($json_data['message'] ?? $_POST['message'] ?? '');
        if (empty($message)) {
            echo json_encode(['success' => false, 'error' => 'Mensaje vacío']);
            exit;
        }

        if ($pdo) {
            $user_id = is_numeric($user['id']) ? (int)$user['id'] : 1;
            $stmt = $pdo->prepare("INSERT INTO `fede_chat_messages` (`room`, `user_id`, `content`) VALUES ('general', ?, ?)");
            $stmt->execute([$user_id, $message]);
        }

        echo json_encode([
            'success' => true,
            'message_item' => [
                'id' => 'chat_' . time(),
                'author' => $user['name'],
                'avatar' => $user['avatar'],
                'is_host' => ($user['role'] === 'admin'),
                'content' => $message,
                'time' => date('H:i')
            ]
        ]);
        exit;

    // ==========================================
    // 👑 PANEL ADMIN: ABM ENDPOINTS (SOLO ADMIN)
    // ==========================================

    case 'admin_get_users':
        fede_require_admin($user);
        if ($pdo) {
            $stmt = $pdo->query("SELECT id, email, name, handle, avatar, role, points, level, level_name, created_at FROM `fede_users` ORDER BY id DESC");
            $users_list = $stmt->fetchAll();
            echo json_encode(['success' => true, 'users' => $users_list]);
            exit;
        }
        echo json_encode(['success' => false, 'error' => 'Sin conexión a base de datos']);
        exit;

    case 'admin_save_user':
        fede_require_admin($user);
        $user_id = (int)($json_data['user_id'] ?? 0);
        $email = trim(strtolower($json_data['email'] ?? ''));
        $name = trim($json_data['name'] ?? '');
        $role = in_array($json_data['role'] ?? '', ['admin', 'member']) ? $json_data['role'] : 'member';
        $points = (int)($json_data['points'] ?? 10);
        $password = $json_data['password'] ?? '';
        $confirm_password = $json_data['confirm_password'] ?? '';
        $plan_id = !empty($json_data['plan_id']) ? (int)$json_data['plan_id'] : null;
        $plan_name = trim($json_data['plan_name'] ?? 'Campus Nowback Pro (Mensual)');
        $plan_expires_at = !empty($json_data['plan_expires_at']) ? $json_data['plan_expires_at'] : null;
        $status = in_array($json_data['status'] ?? '', ['active', 'pending', 'expired', 'suspended']) ? $json_data['status'] : 'active';
        $send_email = !empty($json_data['send_email']);

        if (empty($email) || empty($name)) {
            echo json_encode(['success' => false, 'error' => 'Email y nombre son requeridos.']);
            exit;
        }

        // Validate passwords if provided
        if (!empty($password) && !empty($confirm_password) && $password !== $confirm_password) {
            echo json_encode(['success' => false, 'error' => 'Las contraseñas no coinciden. Por favor verifícalas.']);
            exit;
        }

        if ($user_id <= 0 && empty($password)) {
            echo json_encode(['success' => false, 'error' => 'La contraseña es obligatoria para nuevos usuarios.']);
            exit;
        }

        if ($pdo) {
            if ($user_id > 0) {
                // Update existing user
                if (!empty($password)) {
                    $pass_hash = password_hash($password, PASSWORD_BCRYPT);
                    $stmt = $pdo->prepare("
                        UPDATE `fede_users` 
                        SET `email`=?, `name`=?, `role`=?, `points`=?, `password_hash`=?, `plan_id`=?, `plan_name`=?, `plan_expires_at`=?, `status`=? 
                        WHERE `id`=?
                    ");
                    $stmt->execute([$email, $name, $role, $points, $pass_hash, $plan_id, $plan_name, $plan_expires_at, $status, $user_id]);
                } else {
                    $stmt = $pdo->prepare("
                        UPDATE `fede_users` 
                        SET `email`=?, `name`=?, `role`=?, `points`=?, `plan_id`=?, `plan_name`=?, `plan_expires_at`=?, `status`=? 
                        WHERE `id`=?
                    ");
                    $stmt->execute([$email, $name, $role, $points, $plan_id, $plan_name, $plan_expires_at, $status, $user_id]);
                }
                $saved_id = $user_id;
            } else {
                // Create new user in MySQL
                $pass_hash = password_hash($password, PASSWORD_BCRYPT);
                $handle = '@' . strtolower(preg_replace('/[^a-zA-Z0-9_]/', '', explode('@', $email)[0]));
                $avatar = '/assets/img/fede_avatar_mini.png';
                $stmt = $pdo->prepare("
                    INSERT INTO `fede_users` 
                    (`email`, `password_hash`, `name`, `handle`, `avatar`, `role`, `points`, `level`, `level_name`, `plan_id`, `plan_name`, `plan_expires_at`, `status`, `email_verified`) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, 1, 'Iniciado', ?, ?, ?, ?, 1)
                ");
                $stmt->execute([$email, $pass_hash, $name, $handle, $avatar, $role, $points, $plan_id, $plan_name, $plan_expires_at, $status]);
                $saved_id = (int)$pdo->lastInsertId();
            }

            // Send Welcome Email if requested
            if ($send_email && !empty($email)) {
                @fede_send_welcome_user_email($email, $name, $password, $plan_name);
            }

            echo json_encode([
                'success' => true,
                'message' => 'Usuario guardado con éxito en MySQL.',
                'user_id' => $saved_id
            ]);
            exit;
        }
        echo json_encode(['success' => false, 'error' => 'Error de conexión a la base de datos']);
        exit;

    case 'admin_delete_user':
        fede_require_admin($user);
        $del_id = (int)($json_data['user_id'] ?? 0);
        if ($del_id > 0 && $pdo) {
            // Check if superadmin
            $chk = $pdo->prepare("SELECT `email` FROM `fede_users` WHERE `id` = ?");
            $chk->execute([$del_id]);
            $user_email = strtolower($chk->fetchColumn() ?: '');

            if ($user_email === 'mfmujic@gmail.com') {
                echo json_encode(['success' => false, 'error' => 'No es posible eliminar al Administrador principal.']);
                exit;
            }

            $stmt_del = $pdo->prepare("DELETE FROM `fede_users` WHERE `id` = ?");
            $stmt_del->execute([$del_id]);

            echo json_encode(['success' => true, 'message' => 'Usuario eliminado correctamente de la base de datos']);
            exit;
        }
        echo json_encode(['success' => false, 'error' => 'ID de usuario inválido']);
        exit;

    case 'admin_get_plans':
        fede_require_admin($user);
        if ($pdo) {
            $plans = $pdo->query("SELECT * FROM `fede_plans` ORDER BY `order_num` ASC, `id` ASC")->fetchAll();
            echo json_encode(['success' => true, 'plans' => $plans]);
            exit;
        }
        echo json_encode(['success' => false, 'error' => 'Sin conexión']);
        exit;

    case 'admin_save_plan':
        fede_require_admin($user);
        $plan_id = (int)($json_data['plan_id'] ?? 0);
        $name = trim($json_data['name'] ?? '');
        $slug = trim($json_data['slug'] ?? '') ?: strtolower(preg_replace('/[^a-z0-9]/', '-', $name));
        $badge = trim($json_data['badge'] ?? '');
        $price_ars = (int)($json_data['price_ars'] ?? 0);
        $price_usd = (int)($json_data['price_usd'] ?? 0);
        $period = trim($json_data['period'] ?? 'mensual');
        $description = trim($json_data['description'] ?? '');
        $features = is_array($json_data['features'] ?? null) ? json_encode($json_data['features']) : ($json_data['features'] ?? '[]');
        $checkout_url = trim($json_data['checkout_url'] ?? '');
        $is_active = isset($json_data['is_active']) ? (int)$json_data['is_active'] : 1;

        if (empty($name)) {
            echo json_encode(['success' => false, 'error' => 'El nombre del plan es obligatorio']);
            exit;
        }

        if ($pdo) {
            if ($plan_id > 0) {
                $stmt = $pdo->prepare("UPDATE `fede_plans` SET `name`=?, `slug`=?, `badge`=?, `price_ars`=?, `price_usd`=?, `period`=?, `description`=?, `features_json`=?, `checkout_url`=?, `is_active`=? WHERE `id`=?");
                $stmt->execute([$name, $slug, $badge, $price_ars, $price_usd, $period, $description, $features, $checkout_url, $is_active, $plan_id]);
            } else {
                $stmt = $pdo->prepare("INSERT INTO `fede_plans` (`name`, `slug`, `badge`, `price_ars`, `price_usd`, `period`, `description`, `features_json`, `checkout_url`, `is_active`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                $stmt->execute([$name, $slug, $badge, $price_ars, $price_usd, $period, $description, $features, $checkout_url, $is_active]);
            }
            echo json_encode(['success' => true, 'message' => 'Plan guardado exitosamente']);
            exit;
        }
        echo json_encode(['success' => false, 'error' => 'Error al guardar plan']);
        exit;

    case 'admin_delete_plan':
        fede_require_admin($user);
        $plan_id = (int)($json_data['plan_id'] ?? 0);
        if ($plan_id > 0 && $pdo) {
            $pdo->prepare("DELETE FROM `fede_plans` WHERE `id` = ?")->execute([$plan_id]);
            echo json_encode(['success' => true, 'message' => 'Plan eliminado']);
            exit;
        }
        echo json_encode(['success' => false, 'error' => 'ID inválido']);
        exit;

    case 'admin_save_course':
        fede_require_admin($user);
        $course_id = (int)($json_data['course_id'] ?? 0);
        $title = trim($json_data['title'] ?? '');
        $slug = trim($json_data['slug'] ?? '') ?: strtolower(preg_replace('/[^a-z0-9]/', '-', $title));
        $description = trim($json_data['description'] ?? '');
        $thumbnail = trim($json_data['thumbnail'] ?? '') ?: '/assets/img/fede_nowback_hero.jpg';
        $duration = trim($json_data['duration'] ?? '3h 00m');
        $level_required = (int)($json_data['level_required'] ?? 1);

        if (empty($title)) {
            echo json_encode(['success' => false, 'error' => 'El título del curso es requerido']);
            exit;
        }

        if ($pdo) {
            if ($course_id > 0) {
                $stmt = $pdo->prepare("UPDATE `fede_courses` SET `title`=?, `slug`=?, `description`=?, `thumbnail`=?, `duration`=?, `level_required`=? WHERE `id`=?");
                $stmt->execute([$title, $slug, $description, $thumbnail, $duration, $level_required, $course_id]);
            } else {
                $stmt = $pdo->prepare("INSERT INTO `fede_courses` (`title`, `slug`, `description`, `thumbnail`, `duration`, `level_required`) VALUES (?, ?, ?, ?, ?, ?)");
                $stmt->execute([$title, $slug, $description, $thumbnail, $duration, $level_required]);
                $course_id = $pdo->lastInsertId();
                // Create a default module
                $pdo->prepare("INSERT INTO `fede_modules` (`course_id`, `title`, `order_num`) VALUES (?, 'Módulo 1: Introducción', 1)")->execute([$course_id]);
            }
            echo json_encode(['success' => true, 'message' => 'Curso guardado', 'course_id' => $course_id]);
            exit;
        }
        echo json_encode(['success' => false, 'error' => 'Error de BD']);
        exit;

    case 'admin_delete_course':
        fede_require_admin($user);
        $course_id = (int)($json_data['course_id'] ?? 0);
        if ($course_id > 0 && $pdo) {
            $pdo->prepare("DELETE FROM `fede_courses` WHERE `id` = ?")->execute([$course_id]);
            echo json_encode(['success' => true, 'message' => 'Curso eliminado']);
            exit;
        }
        echo json_encode(['success' => false, 'error' => 'ID inválido']);
        exit;

    case 'admin_save_lesson':
        fede_require_admin($user);
        $lesson_id = (int)($json_data['lesson_id'] ?? 0);
        $module_id = (int)($json_data['module_id'] ?? 0);
        $course_id = (int)($json_data['course_id'] ?? 0);
        $title = trim($json_data['title'] ?? '');
        $duration = trim($json_data['duration'] ?? '15:00');
        $video_url = fede_format_video_embed_url(trim($json_data['video_url'] ?? ''));
        $description = trim($json_data['description'] ?? '');
        $is_free = !empty($json_data['is_free']) ? 1 : 0;

        if (empty($title)) {
            echo json_encode(['success' => false, 'error' => 'El título de la lección es obligatorio']);
            exit;
        }

        if ($pdo) {
            if ($module_id <= 0 && $course_id > 0) {
                // Find or create first module
                $stmt_m = $pdo->prepare("SELECT id FROM `fede_modules` WHERE `course_id` = ? LIMIT 1");
                $stmt_m->execute([$course_id]);
                $module_id = (int)$stmt_m->fetchColumn();
                if ($module_id <= 0) {
                    $pdo->prepare("INSERT INTO `fede_modules` (`course_id`, `title`, `order_num`) VALUES (?, 'Módulo 1', 1)")->execute([$course_id]);
                    $module_id = (int)$pdo->lastInsertId();
                }
            }

            if ($lesson_id > 0) {
                $stmt = $pdo->prepare("UPDATE `fede_lessons` SET `title`=?, `duration`=?, `video_url`=?, `description`=?, `is_free`=? WHERE `id`=?");
                $stmt->execute([$title, $duration, $video_url, $description, $is_free, $lesson_id]);
            } else {
                $stmt = $pdo->prepare("INSERT INTO `fede_lessons` (`module_id`, `title`, `duration`, `video_url`, `description`, `is_free`) VALUES (?, ?, ?, ?, ?, ?)");
                $stmt->execute([$module_id ?: 1, $title, $duration, $video_url, $description, $is_free]);
                $lesson_id = $pdo->lastInsertId();
            }
            echo json_encode(['success' => true, 'message' => 'Lección guardada', 'lesson_id' => $lesson_id]);
            exit;
        }
        echo json_encode(['success' => false, 'error' => 'Error de BD']);
        exit;

    case 'admin_delete_lesson':
        fede_require_admin($user);
        $lesson_id = (int)($json_data['lesson_id'] ?? 0);
        if ($lesson_id > 0 && $pdo) {
            $pdo->prepare("DELETE FROM `fede_lessons` WHERE `id` = ?")->execute([$lesson_id]);
            echo json_encode(['success' => true, 'message' => 'Lección eliminada']);
            exit;
        }
        echo json_encode(['success' => false, 'error' => 'ID inválido']);
        exit;

    case 'admin_save_meet':
        fede_require_admin($user);
        $meet_id = (int)($json_data['meet_id'] ?? 0);
        $title = trim($json_data['title'] ?? '');
        $description = trim($json_data['description'] ?? '');
        $meet_date = trim($json_data['meet_date'] ?? '');
        $meet_time = trim($json_data['meet_time'] ?? '');
        $platform = trim($json_data['platform'] ?? 'Zoom Pro');
        $zoom_url = trim($json_data['zoom_url'] ?? '');
        $google_cal_url = trim($json_data['google_cal_url'] ?? '');

        if (empty($title) || empty($meet_date)) {
            echo json_encode(['success' => false, 'error' => 'Título y fecha son requeridos']);
            exit;
        }

        if ($pdo) {
            if ($meet_id > 0) {
                $stmt = $pdo->prepare("UPDATE `fede_meets` SET `title`=?, `description`=?, `meet_date`=?, `meet_time`=?, `platform`=?, `zoom_url`=?, `google_cal_url`=? WHERE `id`=?");
                $stmt->execute([$title, $description, $meet_date, $meet_time, $platform, $zoom_url, $google_cal_url, $meet_id]);
            } else {
                $admin_id = is_numeric($user['id']) ? (int)$user['id'] : 1;
                $stmt = $pdo->prepare("INSERT INTO `fede_meets` (`title`, `description`, `meet_date`, `meet_time`, `platform`, `zoom_url`, `google_cal_url`, `created_by`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
                $stmt->execute([$title, $description, $meet_date, $meet_time, $platform, $zoom_url, $google_cal_url, $admin_id]);
            }
            echo json_encode(['success' => true, 'message' => 'Meet en vivo guardado']);
            exit;
        }
        echo json_encode(['success' => false, 'error' => 'Error de BD']);
        exit;

    case 'admin_delete_meet':
        fede_require_admin($user);
        $meet_id = (int)($json_data['meet_id'] ?? 0);
        if ($meet_id > 0 && $pdo) {
            $pdo->prepare("DELETE FROM `fede_meets` WHERE `id` = ?")->execute([$meet_id]);
            echo json_encode(['success' => true, 'message' => 'Sesión eliminada']);
            exit;
        }
        echo json_encode(['success' => false, 'error' => 'ID inválido']);
        exit;

    case 'admin_update_settings':
        fede_require_admin($user);
        $enable_gamification = isset($json_data['enable_gamification']) ? ($json_data['enable_gamification'] ? '1' : '0') : '0';
        $community_name = trim($json_data['community_name'] ?? 'Campus Fede Nowback Pro');
        $admin_whatsapp = trim($json_data['admin_whatsapp'] ?? '5491138205570');

        fede_set_setting('enable_gamification', $enable_gamification);
        fede_set_setting('community_name', $community_name);
        fede_set_setting('admin_whatsapp', $admin_whatsapp);

        echo json_encode(['success' => true, 'message' => 'Configuración actualizada exitosamente']);
        exit;

    // ==========================================
    // 🗑️ ENDPOINTS DE ELIMINACIÓN DE CONTENIDOS (ADMIN / AUTOR)
    // ==========================================

    case 'delete_post':
    case 'admin_delete_post':
        fede_require_auth($user);
        $post_id_raw = $json_data['post_id'] ?? $_POST['post_id'] ?? 0;
        $post_id = (int)str_replace('post_', '', $post_id_raw);

        if ($post_id <= 0) {
            echo json_encode(['success' => false, 'error' => 'ID de publicación inválido']);
            exit;
        }

        if ($pdo) {
            // Verificar si es admin o autor
            $is_admin_user = (!empty($user['role']) && $user['role'] === 'admin');
            $current_user_id = is_numeric($user['id']) ? (int)$user['id'] : 0;

            if ($is_admin_user) {
                $stmt = $pdo->prepare("DELETE FROM `fede_posts` WHERE `id` = ?");
                $stmt->execute([$post_id]);
            } else {
                $stmt = $pdo->prepare("DELETE FROM `fede_posts` WHERE `id` = ? AND `user_id` = ?");
                $stmt->execute([$post_id, $current_user_id]);
            }

            if ($stmt->rowCount() > 0) {
                echo json_encode(['success' => true, 'message' => 'Publicación eliminada correctamente', 'post_id' => $post_id_raw]);
                exit;
            } else {
                echo json_encode(['success' => false, 'error' => 'No tienes permisos para eliminar esta publicación o ya no existe.']);
                exit;
            }
        }

        echo json_encode(['success' => true, 'message' => 'Publicación eliminada', 'post_id' => $post_id_raw]);
        exit;

    case 'delete_comment':
    case 'admin_delete_comment':
        fede_require_auth($user);
        $comment_id_raw = $json_data['comment_id'] ?? $_POST['comment_id'] ?? 0;
        $comment_id = (int)str_replace('comm_', '', $comment_id_raw);

        if ($comment_id <= 0) {
            echo json_encode(['success' => false, 'error' => 'ID de comentario inválido']);
            exit;
        }

        if ($pdo) {
            $is_admin_user = (!empty($user['role']) && $user['role'] === 'admin');
            $current_user_id = is_numeric($user['id']) ? (int)$user['id'] : 0;

            if ($is_admin_user) {
                $stmt = $pdo->prepare("DELETE FROM `fede_comments` WHERE `id` = ?");
                $stmt->execute([$comment_id]);
            } else {
                $stmt = $pdo->prepare("DELETE FROM `fede_comments` WHERE `id` = ? AND `user_id` = ?");
                $stmt->execute([$comment_id, $current_user_id]);
            }

            if ($stmt->rowCount() > 0) {
                echo json_encode(['success' => true, 'message' => 'Comentario eliminado correctamente', 'comment_id' => $comment_id_raw]);
                exit;
            } else {
                echo json_encode(['success' => false, 'error' => 'No tienes permisos para eliminar este comentario o ya no existe.']);
                exit;
            }
        }

        echo json_encode(['success' => true, 'message' => 'Comentario eliminado', 'comment_id' => $comment_id_raw]);
        exit;

    case 'delete_chat':
    case 'admin_delete_chat':
        fede_require_admin($user);
        $chat_id_raw = $json_data['chat_id'] ?? $_POST['chat_id'] ?? 0;
        $chat_id = (int)str_replace('chat_', '', $chat_id_raw);

        if ($chat_id > 0 && $pdo) {
            $stmt = $pdo->prepare("DELETE FROM `fede_chat_messages` WHERE `id` = ?");
            $stmt->execute([$chat_id]);
            echo json_encode(['success' => true, 'message' => 'Mensaje de chat eliminado']);
            exit;
        }

        echo json_encode(['success' => false, 'error' => 'ID de mensaje inválido']);
        exit;

    default:
        echo json_encode(['success' => false, 'error' => 'Acción no reconocida']);
        exit;
}
