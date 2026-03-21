-- TMAS.az Database Schema
-- Run: mysql -u root tmas_az < database/migration.sql

CREATE TABLE IF NOT EXISTS `services` (
    `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `icon` VARCHAR(255) DEFAULT NULL,
    `title_az` VARCHAR(255) NOT NULL DEFAULT '',
    `title_en` VARCHAR(255) NOT NULL DEFAULT '',
    `title_ru` VARCHAR(255) NOT NULL DEFAULT '',
    `slug_az` VARCHAR(255) NOT NULL DEFAULT '',
    `slug_en` VARCHAR(255) NOT NULL DEFAULT '',
    `slug_ru` VARCHAR(255) NOT NULL DEFAULT '',
    `description_az` TEXT,
    `description_en` TEXT,
    `description_ru` TEXT,
    `content_az` LONGTEXT,
    `content_en` LONGTEXT,
    `content_ru` LONGTEXT,
    `is_active` TINYINT(1) NOT NULL DEFAULT 1,
    `sort_order` INT NOT NULL DEFAULT 0,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    UNIQUE KEY `idx_slug_az` (`slug_az`),
    UNIQUE KEY `idx_slug_en` (`slug_en`),
    UNIQUE KEY `idx_slug_ru` (`slug_ru`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `portfolio` (
    `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `image` VARCHAR(255) DEFAULT NULL,
    `title_az` VARCHAR(255) NOT NULL DEFAULT '',
    `title_en` VARCHAR(255) NOT NULL DEFAULT '',
    `title_ru` VARCHAR(255) NOT NULL DEFAULT '',
    `slug_az` VARCHAR(255) NOT NULL DEFAULT '',
    `slug_en` VARCHAR(255) NOT NULL DEFAULT '',
    `slug_ru` VARCHAR(255) NOT NULL DEFAULT '',
    `category_az` VARCHAR(255) DEFAULT NULL,
    `category_en` VARCHAR(255) DEFAULT NULL,
    `category_ru` VARCHAR(255) DEFAULT NULL,
    `description_az` TEXT,
    `description_en` TEXT,
    `description_ru` TEXT,
    `content_az` LONGTEXT,
    `content_en` LONGTEXT,
    `content_ru` LONGTEXT,
    `is_active` TINYINT(1) NOT NULL DEFAULT 1,
    `sort_order` INT NOT NULL DEFAULT 0,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    UNIQUE KEY `idx_slug_az` (`slug_az`),
    UNIQUE KEY `idx_slug_en` (`slug_en`),
    UNIQUE KEY `idx_slug_ru` (`slug_ru`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `posts` (
    `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `image` VARCHAR(255) DEFAULT NULL,
    `title_az` VARCHAR(255) NOT NULL DEFAULT '',
    `title_en` VARCHAR(255) NOT NULL DEFAULT '',
    `title_ru` VARCHAR(255) NOT NULL DEFAULT '',
    `slug_az` VARCHAR(255) NOT NULL DEFAULT '',
    `slug_en` VARCHAR(255) NOT NULL DEFAULT '',
    `slug_ru` VARCHAR(255) NOT NULL DEFAULT '',
    `excerpt_az` TEXT,
    `excerpt_en` TEXT,
    `excerpt_ru` TEXT,
    `content_az` LONGTEXT,
    `content_en` LONGTEXT,
    `content_ru` LONGTEXT,
    `status` ENUM('draft', 'published') NOT NULL DEFAULT 'draft',
    `published_at` TIMESTAMP NULL DEFAULT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    UNIQUE KEY `idx_slug_az` (`slug_az`),
    UNIQUE KEY `idx_slug_en` (`slug_en`),
    UNIQUE KEY `idx_slug_ru` (`slug_ru`),
    KEY `idx_status_published` (`status`, `published_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `pages` (
    `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `title_az` VARCHAR(255) NOT NULL DEFAULT '',
    `title_en` VARCHAR(255) NOT NULL DEFAULT '',
    `title_ru` VARCHAR(255) NOT NULL DEFAULT '',
    `slug_az` VARCHAR(255) NOT NULL DEFAULT '',
    `slug_en` VARCHAR(255) NOT NULL DEFAULT '',
    `slug_ru` VARCHAR(255) NOT NULL DEFAULT '',
    `content_az` LONGTEXT,
    `content_en` LONGTEXT,
    `content_ru` LONGTEXT,
    `is_active` TINYINT(1) NOT NULL DEFAULT 1,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    UNIQUE KEY `idx_slug_az` (`slug_az`),
    UNIQUE KEY `idx_slug_en` (`slug_en`),
    UNIQUE KEY `idx_slug_ru` (`slug_ru`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS `settings` (
    `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `key` VARCHAR(255) NOT NULL,
    `value` TEXT,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    UNIQUE KEY `idx_key` (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Sample data for services
INSERT INTO `services` (`title_az`, `title_en`, `title_ru`, `slug_az`, `slug_en`, `slug_ru`, `description_az`, `description_en`, `description_ru`, `icon`, `sort_order`) VALUES
('Veb Sayt Hazırlanması', 'Web Development', 'Веб-разработка', 'veb-sayt-hazirlanmasi', 'web-development', 'veb-razrabotka', 'Müasir və responsiv veb saytların hazırlanması', 'Development of modern and responsive websites', 'Разработка современных и адаптивных веб-сайтов', 'services/web.svg', 1),
('Mobil Tətbiqlər', 'Mobile Apps', 'Мобильные приложения', 'mobil-tetbiqler', 'mobile-apps', 'mobilnye-prilozheniya', 'iOS və Android üçün mobil tətbiqlərin hazırlanması', 'Development of mobile applications for iOS and Android', 'Разработка мобильных приложений для iOS и Android', 'services/mobile.svg', 2),
('SEO Xidmətləri', 'SEO Services', 'SEO Услуги', 'seo-xidmetleri', 'seo-services', 'seo-uslugi', 'Axtarış sistemlərində optimallaşdırma', 'Search engine optimization services', 'Услуги поисковой оптимизации', 'services/seo.svg', 3);

-- Sample settings
INSERT INTO `settings` (`key`, `value`) VALUES
('site_name', 'TMAS'),
('site_email', 'info@tmas.az'),
('site_phone', '+994 50 000 00 00');
