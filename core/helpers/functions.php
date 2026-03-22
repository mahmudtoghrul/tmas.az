<?php
/**
 * Global helper functions
 */

use Core\Language;
use Core\CSRF;
use Core\App;

/** Translate a string */
function __($key, array $replace = []): string
{
    return Language::get($key, $replace);
}

/** Generate a localized URL */
function url(string $path = ''): string
{
    return Language::url($path);
}

/** Get current language code */
function lang(): string
{
    return Language::current();
}

/** Generate asset URL with cache-busting */
function asset(string $path): string
{
    $filePath = ROOT_PATH . '/public/assets/' . ltrim($path, '/');
    $version = file_exists($filePath) ? filemtime($filePath) : '1';
    return '/assets/' . ltrim($path, '/') . '?v=' . $version;
}

/** Escape HTML output */
function e(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

/** CSRF token field */
function csrf_field(): string
{
    return CSRF::field();
}

/** Get config value */
function config(string $key, mixed $default = null): mixed
{
    return App::config($key, $default);
}

/** Redirect to URL */
function redirect(string $url): never
{
    header("Location: $url");
    exit;
}

/** Check if current URI matches */
function is_active(string $path): bool
{
    $current = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    return $current === url($path);
}

/** Truncate text */
function str_limit(string $text, int $limit = 150): string
{
    if (mb_strlen($text) <= $limit) return $text;
    return mb_substr($text, 0, $limit) . '...';
}

/** Generate slug from text */
function slugify(string $text): string
{
    $text = mb_strtolower($text);
    $text = preg_replace('/[^a-z0-9\-]/', '-', $text);
    $text = preg_replace('/-+/', '-', $text);
    return trim($text, '-');
}

/** Upload a file and return the relative path */
function upload_file(array $file, string $directory = 'uploads'): string|false
{
    if ($file['error'] !== UPLOAD_ERR_OK || $file['size'] === 0) {
        return false;
    }

    $allowed = ['image/jpeg', 'image/png', 'image/gif', 'image/webp', 'image/svg+xml'];
    $finfo = new \finfo(FILEINFO_MIME_TYPE);
    $mime = $finfo->file($file['tmp_name']);

    if (!in_array($mime, $allowed, true)) {
        return false;
    }

    $ext = match ($mime) {
        'image/jpeg' => 'jpg',
        'image/png' => 'png',
        'image/gif' => 'gif',
        'image/webp' => 'webp',
        'image/svg+xml' => 'svg',
        default => 'jpg',
    };

    $filename = uniqid('img_', true) . '.' . $ext;
    $targetDir = ROOT_PATH . '/public/' . trim($directory, '/');

    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0755, true);
    }

    $targetPath = $targetDir . '/' . $filename;
    if (move_uploaded_file($file['tmp_name'], $targetPath)) {
        return '/' . trim($directory, '/') . '/' . $filename;
    }

    return false;
}

/** Get flash message and clear it */
function flash(string $key = ''): mixed
{
    if ($key) {
        $value = $_SESSION['flash'][$key] ?? null;
        unset($_SESSION['flash'][$key]);
        return $value;
    }
    $flash = $_SESSION['flash'] ?? [];
    unset($_SESSION['flash']);
    return $flash;
}

/** Set flash message */
function flash_set(string $key, string $message): void
{
    $_SESSION['flash'][$key] = $message;
}

/** Method spoofing field for forms */
function method_field(string $method): string
{
    return '<input type="hidden" name="_method" value="' . strtoupper($method) . '">';
}
