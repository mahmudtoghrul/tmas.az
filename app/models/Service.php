<?php

namespace App\Models;

use Core\Model;

class Service extends Model
{
    protected static string $table = 'services';

    public static function active(): array
    {
        return self::where('is_active', 1, 'sort_order ASC');
    }
}
