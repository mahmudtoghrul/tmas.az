<?php

namespace App\Models;

use Core\Model;

class Post extends Model
{
    protected static string $table = 'posts';

    public static function published(int $page = 1, int $perPage = 12): array
    {
        return self::paginate($page, $perPage, 'status = ? AND published_at <= NOW()', ['published']);
    }
}
