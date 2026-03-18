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
