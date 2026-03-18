<?php

namespace Core;

class Language
{
    private static string $current = 'az';
    private static array $translations = [];

    public static function detect(): string
    {
        $uri = $_SERVER['REQUEST_URI'] ?? '/';
        $languages = App::config('languages');

        foreach ($languages as $code => $lang) {
            if ($lang['prefix'] && str_starts_with($uri, $lang['prefix'] . '/') || $uri === $lang['prefix']) {
                return $code;
            }
        }

        return App::config('default_language', 'az');
    }

    public static function set(string $lang): void
    {
        self::$current = $lang;
        self::loadTranslations($lang);
    }

    public static function current(): string
    {
        return self::$current;
    }

    public static function get(string $key, array $replace = []): string
    {
        $text = self::$translations[$key] ?? $key;

        foreach ($replace as $search => $value) {
            $text = str_replace(":$search", $value, $text);
        }

        return $text;
    }

    public static function url(string $path = ''): string
    {
        $config = App::config('languages');
        $prefix = $config[self::$current]['prefix'] ?? '';
        $path = '/' . ltrim($path, '/');
        return $prefix . ($path === '/' ? '' : $path) ?: '/';
    }

    public static function switchUrl(string $targetLang): string
    {
        $uri = $_SERVER['REQUEST_URI'] ?? '/';
        $config = App::config('languages');

        // Remove current language prefix
        $currentPrefix = $config[self::$current]['prefix'] ?? '';
        if ($currentPrefix && str_starts_with($uri, $currentPrefix)) {
            $uri = substr($uri, strlen($currentPrefix)) ?: '/';
        }

        // Add target language prefix
        $targetPrefix = $config[$targetLang]['prefix'] ?? '';
        return $targetPrefix . $uri;
    }

    private static function loadTranslations(string $lang): void
    {
        $file = ROOT_PATH . "/lang/$lang/messages.php";
        if (file_exists($file)) {
            self::$translations = require $file;
        }
    }
}
