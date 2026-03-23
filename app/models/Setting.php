<?php

namespace App\Models;

use Core\Database;
use Core\Model;

class Setting extends Model
{
    protected static string $table = 'settings';

    private static ?array $cache = null;

    /**
     * Load all settings into memory cache (single query).
     */
    private static function loadCache(): void
    {
        if (self::$cache !== null) return;

        self::$cache = [];
        $rows = Database::fetchAll("SELECT `key`, `value` FROM `settings`");
        foreach ($rows as $row) {
            self::$cache[$row['key']] = $row['value'];
        }
    }

    public static function get(string $key, string $default = ''): string
    {
        self::loadCache();
        return self::$cache[$key] ?? $default;
    }

    public static function set(string $key, string $value): void
    {
        $existing = Database::fetch(
            "SELECT `id` FROM `settings` WHERE `key` = ?",
            [$key]
        );

        if ($existing) {
            Database::query(
                "UPDATE `settings` SET `value` = ? WHERE `id` = ?",
                [$value, $existing['id']]
            );
        } else {
            Database::query(
                "INSERT INTO `settings` (`key`, `value`) VALUES (?, ?)",
                [$key, $value]
            );
        }

        // Update cache
        self::$cache[$key] = $value;
    }

    /**
     * Clear the settings cache (useful after bulk updates).
     */
    public static function clearCache(): void
    {
        self::$cache = null;
    }
}
