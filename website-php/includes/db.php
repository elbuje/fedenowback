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
            `is_free` TINYINT(1) NOT NULL DEFAULT 0,
            `action_items` TEXT,
            `resources` TEXT,
            `order_num` INT NOT NULL DEFAULT 0,
            FOREIGN KEY (`module_id`) REFERENCES `fede_modules`(`id`) ON DELETE CASCADE
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
    ");

    // Safe column check/addition for is_free
    try {
        $pdo->exec("ALTER TABLE `fede_lessons` ADD COLUMN `is_free` TINYINT(1) NOT NULL DEFAULT 0 AFTER `description`");
    } catch (Exception $e) {
        // Column already exists
    }

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

    // 12. Plans & Pricing Table
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS `fede_plans` (
            `id` INT AUTO_INCREMENT PRIMARY KEY,
            `slug` VARCHAR(100) NOT NULL UNIQUE,
            `name` VARCHAR(150) NOT NULL,
            `badge` VARCHAR(60) DEFAULT 'Recomendado',
            `price_ars` INT NOT NULL DEFAULT 0,
            `price_usd` INT NOT NULL DEFAULT 0,
            `period` VARCHAR(50) NOT NULL DEFAULT 'mensual',
            `description` TEXT,
            `features_json` TEXT,
            `checkout_url` TEXT,
            `is_active` TINYINT(1) NOT NULL DEFAULT 1,
            `order_num` INT NOT NULL DEFAULT 0,
            `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
    ");

    // 13. System Settings Table
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS `fede_settings` (
            `setting_key` VARCHAR(100) PRIMARY KEY,
            `setting_value` TEXT NOT NULL,
            `updated_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
    ");

    // Seed default settings if not exists
    $stmt_set = $pdo->prepare("SELECT COUNT(*) FROM `fede_settings` WHERE `setting_key` = ?");
    $stmt_set->execute(['enable_gamification']);
    if ($stmt_set->fetchColumn() == 0) {
        $ins_set = $pdo->prepare("INSERT INTO `fede_settings` (`setting_key`, `setting_value`) VALUES (?, ?)");
        $ins_set->execute(['enable_gamification', '0']); // Inactivo por defecto para no complicar al admin
        $ins_set->execute(['community_name', 'Campus Fede Nowback Pro']);
        $ins_set->execute(['admin_whatsapp', '5491138205570']);
    }

    // 14. Seed Default Admin User if not exists
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

    // Seed Plans if empty
    $stmt = $pdo->query("SELECT COUNT(*) FROM `fede_plans`");
    if ($stmt->fetchColumn() == 0) {
        $ins_plan = $pdo->prepare("
            INSERT INTO `fede_plans` (`slug`, `name`, `badge`, `price_ars`, `price_usd`, `period`, `description`, `features_json`, `checkout_url`, `is_active`, `order_num`)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, 1, ?)
        ");
        $ins_plan->execute([
            'mensual-pro',
            'Campus Nowback Pro (Mensual)',
            'Acceso Básico',
            35000,
            29,
            'mensual',
            'Acceso completo a la comunidad, muro de debates y academia nivel 1 y 2.',
            json_encode([
                'Acceso al Muro de Debates y Victorias',
                'Cursos Nivel 1 y Nivel 2 de la Academia',
                'Chat grupal de la comunidad',
                '1 Meet grupal mensual'
            ]),
            'https://wa.me/5491138205570?text=Quiero+sumarme+al+Campus+Pro+Mensual',
            1
        ]);
        $ins_plan->execute([
            'trimestral-pro',
            'Plan Trimestral + Hot Seats',
            '🔥 Más Elegido',
            95000,
            79,
            'trimestral',
            'Acompañamiento intensivo de 90 días con Hot Seats semanales y todas las masterclasses.',
            json_encode([
                'Todo lo del Plan Mensual',
                'Acceso a todos los niveles de la Academia',
                'Hot Seats semanales en vivo con Fede (Zoom)',
                'Auditoría express de tu perfil de Instagram',
                'Descuento del 15% en Workshops presenciales'
            ]),
            'https://wa.me/5491138205570?text=Quiero+sumarme+al+Plan+Trimestral+Hot+Seats',
            2
        ]);
        $ins_plan->execute([
            'mentoria-vip',
            'Programa Mentoría 1 a 1 VIP',
            '👑 Exclusivo',
            540000,
            450,
            'único',
            'Mentoring uno a uno personalizado con Fede Nowback. Cupos muy limitados.',
            json_encode([
                '4 Sesiones 1 a 1 de 60 min con Fede',
                'Acceso Vitalicio al Campus Nowback Pro',
                'Revisión directa de guiones y ofertas por WhatsApp privado',
                'Diseño de funnel y estrategia de monetización personalizada'
            ]),
            'https://wa.me/5491138205570?text=Quiero+postularme+a+la+Mentoria+1a1+VIP',
            3
        ]);
    }

    // Seed Courses & Lessons if empty
    $stmt = $pdo->query("SELECT COUNT(*) FROM `fede_courses`");
    if ($stmt->fetchColumn() == 0) {
        $ins_course = $pdo->prepare("
            INSERT INTO `fede_courses` (`slug`, `title`, `description`, `thumbnail`, `level_required`, `level_name`, `duration`, `total_lessons`, `order_num`)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)
        ");
        $ins_mod = $pdo->prepare("INSERT INTO `fede_modules` (`course_id`, `title`, `order_num`) VALUES (?, ?, ?)");
        $ins_les = $pdo->prepare("
            INSERT INTO `fede_lessons` (`module_id`, `title`, `duration`, `video_url`, `description`, `action_items`, `resources`, `order_num`)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)
        ");

        // Curso 1
        $ins_course->execute([
            'metodo-nowback',
            'Método Nowback: Marca Personal Imparable',
            'El sistema paso a paso para posicionar tu autoridad, definir tu nicho de alto valor y generar prospectos constantes.',
            '/assets/img/fede_nowback_hero.jpg?v=2',
            1,
            'Iniciado (Nivel 1)',
            '4h 30m',
            3,
            1
        ]);
        $c1_id = $pdo->lastInsertId();

        $ins_mod->execute([$c1_id, 'Módulo 1: Fundamentos de Autoridad & Nicho Imparable', 1]);
        $m1_id = $pdo->lastInsertId();

        $ins_les->execute([
            $m1_id,
            '1.1 La Regla de Oro: Por qué la viralidad sin oferta es una trampa',
            '18:45',
            'https://www.youtube.com/embed/dQw4w9WgXcQ',
            'Aprende a diferenciar el alcance vacío de los seguidores que realmente se convierten en clientes de pago.',
            json_encode(['Definir propuesta de valor en 1 frase.', 'Completar mapa de dolores del cliente.']),
            json_encode([['name' => 'Guía de Posicionamiento (PDF)', 'url' => '#']]),
            1
        ]);
        $ins_les->execute([
            $m1_id,
            '1.2 Anatomía del Perfil de Instagram Magnético',
            '24:10',
            'https://www.youtube.com/embed/dQw4w9WgXcQ',
            'Optimiza tu bio, foto, enlaces y destacados para convertir visitas en prospectos calificados.',
            json_encode(['Optimizar foto de perfil.', 'Configurar biografía con CTA claro.']),
            json_encode([['name' => 'Checklist de Optimización (PDF)', 'url' => '#']]),
            2
        ]);
        $ins_les->execute([
            $m1_id,
            '1.3 Cómo estructurar tu oferta irresistible de Alto Valor',
            '32:00',
            'https://www.youtube.com/embed/dQw4w9WgXcQ',
            'Estructura tu producto o servicio para cobrar lo que vale tu transformación.',
            json_encode(['Definir entregables claros.', 'Fijar precio base.']),
            json_encode([['name' => 'Calculadora de Precios High-Ticket', 'url' => '#']]),
            3
        ]);

        // Curso 2
        $ins_course->execute([
            'mentalidad-de-fuego',
            'Mentalidad de Fuego: 7 Reglas para Dejar de Postergar',
            'Reprogramá tu disciplina diaria, destruí el miedo a la cámara y convertite en una máquina de ejecución.',
            '/assets/img/fede_nowback_fuego.jpg',
            2,
            'Accionador (Nivel 2)',
            '3h 15m',
            1,
            2
        ]);
        $c2_id = $pdo->lastInsertId();

        $ins_mod->execute([$c2_id, 'Módulo 1: La Psicología de la Acción Inmediata', 1]);
        $m2_id = $pdo->lastInsertId();

        $ins_les->execute([
            $m2_id,
            '1.1 Destruyendo la trampa del perfeccionismo paralizante',
            '20:10',
            'https://www.youtube.com/embed/dQw4w9WgXcQ',
            'Cómo romper el bloqueo mental al prender la cámara y publicar todos los días.',
            json_encode(['Aplicar la regla de los 5 segundos para arrancar a grabar.']),
            json_encode([['name' => 'Manual de Acción Inmediata (PDF)', 'url' => '#']]),
            1
        ]);

        // Curso 3
        $ins_course->execute([
            'ventas-dms-whatsapp',
            'Venta por DMs & WhatsApp: De Seguidor a Cliente',
            'Guiones exactos para iniciar conversaciones naturales por mensajes privados y cerrar llamadas de venta.',
            '/assets/img/evento_encende_tu_fuego.jpg',
            3,
            'Creador Constante (Nivel 3)',
            '2h 45m',
            1,
            3
        ]);
        $c3_id = $pdo->lastInsertId();

        $ins_mod->execute([$c3_id, 'Módulo 1: Flujo de Conversación de Alta Conversión', 1]);
        $m3_id = $pdo->lastInsertId();

        $ins_les->execute([
            $m3_id,
            '1.1 Cómo responder a las historias para abrir conversaciones de venta',
            '25:00',
            'https://www.youtube.com/embed/dQw4w9WgXcQ',
            'Scripts prácticos de apertura y caldeo por mensaje directo.',
            json_encode(['Enviar 10 mensajes de prospección utilizando el script.']),
            json_encode([['name' => 'Scripts de Venta por DM (PDF)', 'url' => '#']]),
            1
        ]);

        // Curso 4
        $ins_course->execute([
            'masterclasses-vip',
            'Masterclasses Grabadas & Sesiones VIP con Fede',
            'Archivo exclusivo de todas las mentorías grupales, análisis de casos de éxito y sesiones de Hot Seat en vivo.',
            '/assets/img/fede_nowback_mentor.jpg?v=2',
            4,
            'Creador Imparable (Nivel 4)',
            '18h 00m',
            0,
            4
        ]);
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
