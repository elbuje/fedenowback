-- Schema SQL for Fede Nowback Platform
-- Database: fedenowback_db

-- 1. Users Table
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

-- 2. Categories Table
CREATE TABLE IF NOT EXISTS `fede_categories` (
    `id` VARCHAR(50) PRIMARY KEY,
    `name` VARCHAR(100) NOT NULL,
    `icon` VARCHAR(20) NOT NULL,
    `admin_only` TINYINT(1) NOT NULL DEFAULT 0,
    `order_num` INT NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 3. Posts Table
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

-- 4. Post Likes Table
CREATE TABLE IF NOT EXISTS `fede_post_likes` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `post_id` INT NOT NULL,
    `user_id` INT NOT NULL,
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    UNIQUE KEY `post_user` (`post_id`, `user_id`),
    FOREIGN KEY (`post_id`) REFERENCES `fede_posts`(`id`) ON DELETE CASCADE,
    FOREIGN KEY (`user_id`) REFERENCES `fede_users`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 5. Comments Table
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

-- 6. Courses Table
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

-- 7. Modules Table
CREATE TABLE IF NOT EXISTS `fede_modules` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `course_id` INT NOT NULL,
    `title` VARCHAR(255) NOT NULL,
    `order_num` INT NOT NULL DEFAULT 0,
    FOREIGN KEY (`course_id`) REFERENCES `fede_courses`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 8. Lessons Table
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

-- 9. User Lesson Progress Table
CREATE TABLE IF NOT EXISTS `fede_user_lessons` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `user_id` INT NOT NULL,
    `lesson_id` INT NOT NULL,
    `completed_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    UNIQUE KEY `user_lesson` (`user_id`, `lesson_id`),
    FOREIGN KEY (`user_id`) REFERENCES `fede_users`(`id`) ON DELETE CASCADE,
    FOREIGN KEY (`lesson_id`) REFERENCES `fede_lessons`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 10. Meets Table
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

-- 11. Chat Messages Table
CREATE TABLE IF NOT EXISTS `fede_chat_messages` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `room` VARCHAR(60) NOT NULL DEFAULT 'general',
    `user_id` INT NOT NULL,
    `content` TEXT NOT NULL,
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (`user_id`) REFERENCES `fede_users`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 12. Plans Table
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

-- 13. System Settings Table
CREATE TABLE IF NOT EXISTS `fede_settings` (
    `setting_key` VARCHAR(100) PRIMARY KEY,
    `setting_value` TEXT NOT NULL,
    `updated_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- 14. Contact Leads Table
CREATE TABLE IF NOT EXISTS `contact_leads` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(255) NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    `phone` VARCHAR(64) DEFAULT NULL,
    `subject` VARCHAR(255) DEFAULT NULL,
    `message` TEXT NOT NULL,
    `service_interest` VARCHAR(128) DEFAULT NULL,
    `source_page` VARCHAR(255) DEFAULT '/',
    `ip_address` VARCHAR(64) DEFAULT NULL,
    `status` ENUM('new', 'contacted', 'qualified', 'closed') DEFAULT 'new',
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    INDEX idx_email (`email`),
    INDEX idx_status (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
