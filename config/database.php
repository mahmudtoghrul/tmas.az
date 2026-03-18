<?php
/**
 * Database Configuration
 */

return [
    'driver' => 'mysql',
    'host' => $_ENV['DB_HOST'] ?? '127.0.0.1',
    'port' => $_ENV['DB_PORT'] ?? '3306',
    'database' => $_ENV['DB_NAME'] ?? 'tmas_db',
    'username' => $_ENV['DB_USER'] ?? 'tmas_user',
    'password' => $_ENV['DB_PASS'] ?? '',
    'charset' => 'utf8mb4',
    'collation' => 'utf8mb4_unicode_ci',
];
