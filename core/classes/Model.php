<?php

namespace Core;

abstract class Model
{
    protected static string $table = '';
    protected static string $primaryKey = 'id';

    public static function all(string $orderBy = 'id DESC'): array
    {
        return Database::fetchAll(
            "SELECT * FROM " . static::$table . " ORDER BY $orderBy"
        );
    }

    public static function find(int $id): array|false
    {
        return Database::fetch(
            "SELECT * FROM " . static::$table . " WHERE " . static::$primaryKey . " = ?",
            [$id]
        );
    }

    public static function findBy(string $column, mixed $value): array|false
    {
        return Database::fetch(
            "SELECT * FROM " . static::$table . " WHERE $column = ?",
            [$value]
        );
    }

    public static function where(string $column, mixed $value, string $orderBy = 'id DESC'): array
    {
        return Database::fetchAll(
            "SELECT * FROM " . static::$table . " WHERE $column = ? ORDER BY $orderBy",
            [$value]
        );
    }

    public static function create(array $data): int
    {
        $columns = implode(', ', array_keys($data));
        $placeholders = implode(', ', array_fill(0, count($data), '?'));

        Database::query(
            "INSERT INTO " . static::$table . " ($columns) VALUES ($placeholders)",
            array_values($data)
        );

        return (int) Database::lastInsertId();
    }

    public static function update(int $id, array $data): void
    {
        $set = implode(', ', array_map(fn($col) => "$col = ?", array_keys($data)));
        $values = array_values($data);
        $values[] = $id;

        Database::query(
            "UPDATE " . static::$table . " SET $set WHERE " . static::$primaryKey . " = ?",
            $values
        );
    }

    public static function delete(int $id): void
    {
        Database::query(
            "DELETE FROM " . static::$table . " WHERE " . static::$primaryKey . " = ?",
            [$id]
        );
    }

    public static function paginate(int $page = 1, int $perPage = 12, string $where = '1=1', array $params = []): array
    {
        $offset = ($page - 1) * $perPage;

        $countResult = Database::fetch(
            "SELECT COUNT(*) as total FROM " . static::$table . " WHERE $where",
            $params
        );
        $total = (int) $countResult['total'];

        $items = Database::fetchAll(
            "SELECT * FROM " . static::$table . " WHERE $where ORDER BY id DESC LIMIT $perPage OFFSET $offset",
            $params
        );

        return [
            'items' => $items,
            'total' => $total,
            'page' => $page,
            'per_page' => $perPage,
            'total_pages' => (int) ceil($total / $perPage),
        ];
    }
}
