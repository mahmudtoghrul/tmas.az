<?php

namespace App\Models;

use Core\Model;

class Page extends Model
{
    protected static string $table = 'pages';

    public static function findBySlug(string $slug, string $lang = null): array|false
    {
        $lang = $lang ?? \Core\Language::current();
        return self::findBy("slug_$lang", $slug);
    }
}
