-- TMAS.az Database Schema
-- Run: mysql -u tmas -p tmas_az < migrations/001_initial_schema.sql

CREATE TABLE IF NOT EXISTS `pages` (
    `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `slug_az` VARCHAR(255) NOT NULL,
    `slug_ru` VARCHAR(255) NOT NULL,
    `slug_en` VARCHAR(255) NOT NULL,
    `title_az` VARCHAR(255) NOT NULL,
    `title_ru` VARCHAR(255) NOT NULL,
    `title_en` VARCHAR(255) NOT NULL,
    `content_az` TEXT,
    `content_ru` TEXT,
    `content_en` TEXT,
    `meta_description_az` VARCHAR(500) DEFAULT NULL,
    `meta_description_ru` VARCHAR(500) DEFAULT NULL,
    `meta_description_en` VARCHAR(500) DEFAULT NULL,
    `is_active` TINYINT(1) DEFAULT 1,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    UNIQUE KEY `idx_page_slug_az` (`slug_az`),
    UNIQUE KEY `idx_page_slug_ru` (`slug_ru`),
    UNIQUE KEY `idx_page_slug_en` (`slug_en`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `services` (
    `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `slug_az` VARCHAR(255) NOT NULL,
    `slug_ru` VARCHAR(255) NOT NULL,
    `slug_en` VARCHAR(255) NOT NULL,
    `title_az` VARCHAR(255) NOT NULL,
    `title_ru` VARCHAR(255) NOT NULL,
    `title_en` VARCHAR(255) NOT NULL,
    `description_az` TEXT,
    `description_ru` TEXT,
    `description_en` TEXT,
    `content_az` TEXT,
    `content_ru` TEXT,
    `content_en` TEXT,
    `icon` VARCHAR(255) DEFAULT NULL,
    `image` VARCHAR(255) DEFAULT NULL,
    `sort_order` INT DEFAULT 0,
    `is_active` TINYINT(1) DEFAULT 1,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    UNIQUE KEY `idx_service_slug_az` (`slug_az`),
    UNIQUE KEY `idx_service_slug_ru` (`slug_ru`),
    UNIQUE KEY `idx_service_slug_en` (`slug_en`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `portfolio` (
    `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `slug_az` VARCHAR(255) NOT NULL,
    `slug_ru` VARCHAR(255) NOT NULL,
    `slug_en` VARCHAR(255) NOT NULL,
    `title_az` VARCHAR(255) NOT NULL,
    `title_ru` VARCHAR(255) NOT NULL,
    `title_en` VARCHAR(255) NOT NULL,
    `category_az` VARCHAR(255) DEFAULT NULL,
    `category_ru` VARCHAR(255) DEFAULT NULL,
    `category_en` VARCHAR(255) DEFAULT NULL,
    `content_az` TEXT,
    `content_ru` TEXT,
    `content_en` TEXT,
    `image` VARCHAR(255) DEFAULT NULL,
    `client` VARCHAR(255) DEFAULT NULL,
    `url` VARCHAR(500) DEFAULT NULL,
    `is_active` TINYINT(1) DEFAULT 1,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    UNIQUE KEY `idx_portfolio_slug_az` (`slug_az`),
    UNIQUE KEY `idx_portfolio_slug_ru` (`slug_ru`),
    UNIQUE KEY `idx_portfolio_slug_en` (`slug_en`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `posts` (
    `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `slug_az` VARCHAR(255) NOT NULL,
    `slug_ru` VARCHAR(255) NOT NULL,
    `slug_en` VARCHAR(255) NOT NULL,
    `title_az` VARCHAR(255) NOT NULL,
    `title_ru` VARCHAR(255) NOT NULL,
    `title_en` VARCHAR(255) NOT NULL,
    `excerpt_az` TEXT,
    `excerpt_ru` TEXT,
    `excerpt_en` TEXT,
    `content_az` TEXT,
    `content_ru` TEXT,
    `content_en` TEXT,
    `image` VARCHAR(255) DEFAULT NULL,
    `status` ENUM('draft', 'published') DEFAULT 'draft',
    `published_at` TIMESTAMP NULL DEFAULT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    UNIQUE KEY `idx_post_slug_az` (`slug_az`),
    UNIQUE KEY `idx_post_slug_ru` (`slug_ru`),
    UNIQUE KEY `idx_post_slug_en` (`slug_en`),
    KEY `idx_post_status` (`status`, `published_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `settings` (
    `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `key` VARCHAR(255) NOT NULL,
    `value` TEXT,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    UNIQUE KEY `idx_settings_key` (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `admins` (
    `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(255) NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    UNIQUE KEY `idx_admin_email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `contacts` (
    `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(255) NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    `phone` VARCHAR(50) DEFAULT NULL,
    `message` TEXT NOT NULL,
    `is_read` TINYINT(1) DEFAULT 0,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Default admin (password: change_me_immediately)
INSERT INTO `admins` (`name`, `email`, `password`) VALUES
('Admin', 'admin@tmas.az', '$2y$12$LJ3m4ys3Gp2vMOqT1Jz5d.Kj1rHfYhQVBkXJ6w0FxWqVnF0WK0XS');
