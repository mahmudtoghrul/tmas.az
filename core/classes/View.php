<?php

namespace Core;

class View
{
    private static array $data = [];

    public static function render(string $view, array $data = [], string $layout = 'main'): void
    {
        self::$data = array_merge(self::$data, $data);
        extract(self::$data);

        $viewFile = ROOT_PATH . "/app/views/$view.php";
        if (!file_exists($viewFile)) {
            throw new \RuntimeException("View not found: $view");
        }

        ob_start();
        require $viewFile;
        $content = ob_get_clean();

        if ($layout) {
            $layoutFile = ROOT_PATH . "/app/views/layouts/$layout.php";
            if (file_exists($layoutFile)) {
                require $layoutFile;
            } else {
                echo $content;
            }
        } else {
            echo $content;
        }
    }

    public static function partial(string $partial, array $data = []): void
    {
        extract(array_merge(self::$data, $data));
        $file = ROOT_PATH . "/app/views/partials/$partial.php";
        if (file_exists($file)) {
            require $file;
        }
    }

    public static function adminRender(string $view, array $data = []): void
    {
        self::$data = array_merge(self::$data, $data);
        extract(self::$data);

        ob_start();
        require ROOT_PATH . "/admin/views/pages/$view.php";
        $content = ob_get_clean();

        require ROOT_PATH . '/admin/views/layouts/admin.php';
    }

    public static function set(string $key, mixed $value): void
    {
        self::$data[$key] = $value;
    }
}
