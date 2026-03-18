<?php

namespace Core;

class App
{
    private static array $config = [];

    public function __construct()
    {
        self::$config = require ROOT_PATH . '/config/app.php';
        date_default_timezone_set(self::$config['timezone']);
        $this->initSession();
        $this->loadEnv();
    }

    public function run(): void
    {
        try {
            $lang = Language::detect();
            Language::set($lang);

            require ROOT_PATH . '/config/routes.php';

            $uri = $this->getUri();
            Router::dispatch($uri, $_SERVER['REQUEST_METHOD']);
        } catch (\Exception $e) {
            $this->handleError($e);
        }
    }

    public static function config(string $key, mixed $default = null): mixed
    {
        return self::$config[$key] ?? $default;
    }

    private function initSession(): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_save_path(ROOT_PATH . '/storage/sessions');
            session_start();
        }
    }

    private function loadEnv(): void
    {
        $envFile = ROOT_PATH . '/.env';
        if (file_exists($envFile)) {
            $lines = file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            foreach ($lines as $line) {
                if (str_starts_with(trim($line), '#')) continue;
                if (str_contains($line, '=')) {
                    [$key, $value] = explode('=', $line, 2);
                    $_ENV[trim($key)] = trim($value);
                }
            }
        }
    }

    private function getUri(): string
    {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $uri = rawurldecode($uri);
        return '/' . trim($uri, '/');
    }

    private function handleError(\Exception $e): void
    {
        if (self::$config['debug']) {
            echo '<pre>' . htmlspecialchars($e->getMessage()) . "\n" . $e->getTraceAsString() . '</pre>';
        } else {
            http_response_code(500);
            View::render('errors/500');
        }
    }
}
