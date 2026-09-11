<?php
/**
 * CAMPUS FEDE NOWBACK — MySQL Database Connection & ORM Layer
 * Dedicated database management for Fede Nowback Platform
 */

// Database Credentials
define('FEDE_DB_HOST', getenv('FEDE_DB_HOST') ?: '127.0.0.1');
define('FEDE_DB_PORT', getenv('FEDE_DB_PORT') ?: '3306');
define('FEDE_DB_NAME', getenv('FEDE_DB_NAME') ?: 'fedenowback_db');
define('FEDE_DB_USER', getenv('FEDE_DB_USER') ?: 'fedenowback_user');
define('FEDE_DB_PASS', getenv('FEDE_DB_PASS') ?: 'NowbackFuego2026_SecurePass!');

/**
 * Get PDO Database Connection Singleton
 */
function fede_db() {
    static $pdo = null;
    if ($pdo === null) {
        $dsn = "mysql:host=" . FEDE_DB_HOST . ";port=" . FEDE_DB_PORT . ";dbname=" . FEDE_DB_NAME . ";charset=utf8mb4";
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];
        try {
            $pdo = new PDO($dsn, FEDE_DB_USER, FEDE_DB_PASS, $options);
        } catch (PDOException $e) {
            error_log("Fede Nowback DB Connection Error: " . $e->getMessage());
            return null;
        }
    }
    return $pdo;
}

/**
 * Run Auto-Migrations & Seed Initial Data if Tables Don't Exist
 */
function fede_db_init_schema() {
    $pdo = fede_db();
    if (!$pdo) return false;

    // 1. Users Table
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS `fede_users` (
            `id` INT AUTO_INCREMENT PRIMARY KEY,
            `email` VARCHAR(191) NOT NULL UNIQUE,
            `password_hash` VARCHAR(255) NOT NULL,
            `name` VARCHAR(100) NOT NULL,
            `handle` VARCHAR(60) NOT NULL,
            `avatar` TEXT,
            `role` ENUM('admin', 'member') NOT NULL DEFAULT 'member',
            `bio` TEXT,
            `points` INT NOT NULL DEFAULT 0,
            `level` INT NOT NULL DEFAULT 1,
            `level_name` VARCHAR(60) NOT NULL DEFAULT 'Iniciado',
            `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
    ");

    // 2. Categories Table
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS `fede_categories` (
            `id` VARCHAR(50) PRIMARY KEY,
            `name` VARCHAR(100) NOT NULL,
            `icon` VARCHAR(20) NOT NULL,
            `admin_only` TINYINT(1) NOT NULL DEFAULT 0,
            `order_num` INT NOT NULL DEFAULT 0
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
    ");

    // 3. Posts Table
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS `fede_posts` (
            `id` INT AUTO_INCREMENT PRIMARY KEY,
            `user_id` INT NOT NULL,
            `category_id` VARCHAR(50) NOT NULL,
            `title` VARCHAR(255) NOT NULL,
            `content` TEXT NOT NULL,
            `pinned` TINYINT(1) NOT NULL DEFAULT 0,
            `likes_count` INT NOT NULL DEFAULT 0,
            `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
            INDEX (`category_id`),
            INDEX (`created_at`),
            FOREIGN KEY (`user_id`) REFERENCES `fede_users`(`id`) ON DELETE CASCADE
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
    ");

    // 4. Post Likes Table
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS `fede_post_likes` (
            `id` INT AUTO_INCREMENT PRIMARY KEY,
            `post_id` INT NOT NULL,
            `user_id` INT NOT NULL,
            `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
            UNIQUE KEY `post_user` (`post_id`, `user_id`),
            FOREIGN KEY (`post_id`) REFERENCES `fede_posts`(`id`) ON DELETE CASCADE,
            FOREIGN KEY (`user_id`) REFERENCES `fede_users`(`id`) ON DELETE CASCADE
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
    ");

    // 5. Comments Table
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS `fede_comments` (
            `id` INT AUTO_INCREMENT PRIMARY KEY,
            `post_id` INT NOT NULL,
            `user_id` INT NOT NULL,
            `content` TEXT NOT NULL,
            `likes_count` INT NOT NULL DEFAULT 0,
            `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
            INDEX (`post_id`),
            FOREIGN KEY (`post_id`) REFERENCES `fede_posts`(`id`) ON DELETE CASCADE,
            FOREIGN KEY (`user_id`) REFERENCES `fede_users`(`id`) ON DELETE CASCADE
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
    ");

    // 6. Courses Table
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS `fede_courses` (
            `id` INT AUTO_INCREMENT PRIMARY KEY,
            `slug` VARCHAR(100) NOT NULL UNIQUE,
            `title` VARCHAR(255) NOT NULL,
            `description` TEXT,
            `thumbnail` TEXT,
            `level_required` INT NOT NULL DEFAULT 1,
            `level_name` VARCHAR(60) NOT NULL DEFAULT 'Iniciado (Nivel 1)',
            `duration` VARCHAR(50) NOT NULL DEFAULT '3h 00m',
            `total_lessons` INT NOT NULL DEFAULT 0,
            `order_num` INT NOT NULL DEFAULT 0,
            `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
    ");

    // 7. Modules Table
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS `fede_modules` (
            `id` INT AUTO_INCREMENT PRIMARY KEY,
            `course_id` INT NOT NULL,
            `title` VARCHAR(255) NOT NULL,
            `order_num` INT NOT NULL DEFAULT 0,
            FOREIGN KEY (`course_id`) REFERENCES `fede_courses`(`id`) ON DELETE CASCADE
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
    ");

    // 8. Lessons Table
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS `fede_lessons` (
            `id` INT AUTO_INCREMENT PRIMARY KEY,
            `module_id` INT NOT NULL,
            `title` VARCHAR(255) NOT NULL,
            `duration` VARCHAR(30) NOT NULL DEFAULT '15:00',
            `video_url` TEXT,
            `description` TEXT,
            `action_items` TEXT,
            `resources` TEXT,
            `order_num` INT NOT NULL DEFAULT 0,
            FOREIGN KEY (`module_id`) REFERENCES `fede_modules`(`id`) ON DELETE CASCADE
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
    ");

    // 9. User Lesson Progress Table
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS `fede_user_lessons` (
            `id` INT AUTO_INCREMENT PRIMARY KEY,
            `user_id` INT NOT NULL,
            `lesson_id` INT NOT NULL,
            `completed_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
            UNIQUE KEY `user_lesson` (`user_id`, `lesson_id`),
            FOREIGN KEY (`user_id`) REFERENCES `fede_users`(`id`) ON DELETE CASCADE,
            FOREIGN KEY (`lesson_id`) REFERENCES `fede_lessons`(`id`) ON DELETE CASCADE
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
    ");

    // 10. Meets Table
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS `fede_meets` (
            `id` INT AUTO_INCREMENT PRIMARY KEY,
            `title` VARCHAR(255) NOT NULL,
            `description` TEXT,
            `meet_date` VARCHAR(100) NOT NULL,
            `meet_time` VARCHAR(100) NOT NULL,
            `platform` VARCHAR(60) NOT NULL DEFAULT 'Zoom Pro',
            `zoom_url` TEXT,
            `google_cal_url` TEXT,
            `created_by` INT,
            `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
    ");

    // 11. Chat Messages Table
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS `fede_chat_messages` (
            `id` INT AUTO_INCREMENT PRIMARY KEY,
            `room` VARCHAR(60) NOT NULL DEFAULT 'general',
            `user_id` INT NOT NULL,
            `content` TEXT NOT NULL,
            `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (`user_id`) REFERENCES `fede_users`(`id`) ON DELETE CASCADE
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
    ");

    // 12. Seed Default Admin User if not exists
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM `fede_users` WHERE `email` = ?");
    $stmt->execute(['mfmujic@gmail.com']);
    if ($stmt->fetchColumn() == 0) {
        $pass_hash = password_hash('marcelito', PASSWORD_BCRYPT);
        $insert = $pdo->prepare("
            INSERT INTO `fede_users` (`email`, `password_hash`, `name`, `handle`, `avatar`, `role`, `bio`, `points`, `level`, `level_name`)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
        ");
        $insert->execute([
            'mfmujic@gmail.com',
            $pass_hash,
            'Fede Nowback (Admin)',
            '@fedenowback',
            '/assets/img/fede_nowback_fuego.jpg',
            'admin',
            'Estratega de Marca Personal & Mentor de Negocios Digitales. Administrador del Campus Fede Nowback Pro.',
            9999,
            5,
            '👑 MENTOR & HOST'
        ]);

        // Seed Default Student User
        $insert->execute([
            'alumno@fedenowback.com',
            password_hash('alumno123', PASSWORD_BCRYPT),
            'Alumno Pro',
            '@creador_pro',
            'https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=150&auto=format&fit=crop&q=80',
            'member',
            'Creador de contenido y emprendedor digital en formación.',
            45,
            3,
            'Creador Constante'
        ]);
    }

    // Seed Categories if empty
    $stmt = $pdo->query("SELECT COUNT(*) FROM `fede_categories`");
    if ($stmt->fetchColumn() == 0) {
        $cats = [
            ['todos', 'Todos los temas', '🔥', 0, 1],
            ['comunicados', 'Comunicados de Fede', '📢', 1, 2],
            ['general', 'Debate General', '💬', 0, 3],
            ['victorias', 'Victorias & Facturación', '🏆', 0, 4],
            ['feedback', 'Feedback de Contenido', '🎯', 0, 5],
            ['preguntas', 'Preguntas al Mentor', '💡', 0, 6],
            ['recursos', 'Plantillas & Recursos', '📂', 0, 7]
        ];
        $insert_cat = $pdo->prepare("INSERT INTO `fede_categories` (`id`, `name`, `icon`, `admin_only`, `order_num`) VALUES (?, ?, ?, ?, ?)");
        foreach ($cats as $c) {
            $insert_cat->execute($c);
        }
    }

    // Seed Initial Pinned Post
    $stmt = $pdo->query("SELECT COUNT(*) FROM `fede_posts`");
    if ($stmt->fetchColumn() == 0) {
        // Get Admin user id
        $admin_id = $pdo->query("SELECT id FROM `fede_users` WHERE role='admin' LIMIT 1")->fetchColumn() ?: 1;
        $insert_post = $pdo->prepare("
            INSERT INTO `fede_posts` (`user_id`, `category_id`, `title`, `content`, `pinned`, `likes_count`)
            VALUES (?, ?, ?, ?, 1, 84)
        ");
        $insert_post->execute([
            $admin_id,
            'comunicados',
            '🔥 BIENVENIDA AL CAMPUS: Cómo monetizar tu marca desde cero',
            "¡Creadores y emprendedores, bienvenidos a nuestro Campus Oficial en MySQL!\n\nEste es el espacio donde los creadores vienen a ejecutar, a corregir en público y a facturar con su marca personal.\n\nReglas clave:\n1. Cada like que recibís en tus posts o respuestas te suma FUEGO para desbloquear masterclasses en la Academia.\n2. Los Viernes 19:00 hs tenemos nuestro Meet en Vivo donde abro micrófonos para Hot Seats en directo.\n3. Si lograste una venta, compartilo en #Victorias para inspirar al resto.\n\nDejá un comentario abajo presentándote: quién sos, qué vendés y tu meta de este mes."
        ]);

        // Seed Meet
        $insert_meet = $pdo->prepare("
            INSERT INTO `fede_meets` (`title`, `description`, `meet_date`, `meet_time`, `platform`, `zoom_url`, `google_cal_url`, `created_by`)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)
        ");
        $insert_meet->execute([
            '🔥 Mentoría Grupal & Hot Seat en Vivo con Fede',
            'Sesión en directo donde Fede abre micrófono para auditar cuentas de Instagram y destrabar ofertas.',
            'Viernes 18 de Septiembre, 2026',
            '19:00 hs (Buenos Aires / UTC-3)',
            'Zoom Pro',
            'https://zoom.us/j/fedenowback-hotseat',
            'https://calendar.google.com/',
            $admin_id
        ]);
    }

    // 13. Auto-sanitize legacy seed records if any exist
    try {
        $pdo->exec("
            UPDATE `fede_users` 
            SET `email` = 'alumno@fedenowback.com', 
                `name` = 'Alumno Pro', 
                `handle` = '@creador_pro' 
            WHERE `email` = 'alumno@atrevidos.com' OR `name` LIKE '%Atrevido%';
        ");
        $pdo->exec("
            UPDATE `fede_posts`
            SET `title` = REPLACE(REPLACE(`title`, 'CAMPUS ATREVIDO', 'CAMPUS NOWBACK PRO'), 'Atrevido', 'Pro'),
                `content` = REPLACE(REPLACE(REPLACE(`content`, '¡Atrevidos,', '¡Creadores,'), 'Atrevido', 'Pro'), 'atrevido', 'creador')
            WHERE `title` LIKE '%Atrevid%' OR `content` LIKE '%Atrevid%';
        ");
        $pdo->exec("
            UPDATE `fede_comments`
            SET `content` = REPLACE(REPLACE(`content`, 'Atrevido', 'Pro'), 'atrevido', 'creador')
            WHERE `content` LIKE '%Atrevid%';
        ");
    } catch (Exception $e) {
        error_log('Fede DB legacy cleanup warning: ' . $e->getMessage());
    }

    return true;
}
