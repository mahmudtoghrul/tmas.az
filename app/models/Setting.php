<?php

namespace App\Models;

use Core\Database;
use Core\Model;

class Setting extends Model
{
    protected static string $table = 'settings';

    public static function get(string $key, string $default = ''): string
    {
        $row = self::findBy('key', $key);
        return $row ? $row['value'] : $default;
    }

    public static function set(string $key, string $value): void
    {
        $existing = self::findBy('key', $key);
        if ($existing) {
            self::update($existing['id'], ['value' => $value]);
        } else {
            self::create(['key' => $key, 'value' => $value]);
        }
    }
}
