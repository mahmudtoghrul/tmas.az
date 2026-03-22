<?php

namespace Core;

class Router
{
    private static array $routes = [];
    private static string $groupPrefix = '';

    public static function get(string $path, string $action): void
    {
        self::addRoute('GET', $path, $action);
    }

    public static function post(string $path, string $action): void
    {
        self::addRoute('POST', $path, $action);
    }

    public static function put(string $path, string $action): void
    {
        self::addRoute('PUT', $path, $action);
    }

    public static function delete(string $path, string $action): void
    {
        self::addRoute('DELETE', $path, $action);
    }

    public static function resource(string $path, string $controller): void
    {
        self::get($path, "$controller@index");
        self::get("$path/create", "$controller@create");
        self::post($path, "$controller@store");
        self::get("$path/{id}/edit", "$controller@edit");
        self::put("$path/{id}", "$controller@update");
        self::delete("$path/{id}", "$controller@destroy");
    }

    public static function group(string $prefix, callable $callback): void
    {
        $previousPrefix = self::$groupPrefix;
        self::$groupPrefix .= $prefix;
        $callback();
        self::$groupPrefix = $previousPrefix;
    }

    public static function dispatch(string $uri, string $method): void
    {
        // Strip language prefix from URI for matching
        $lang = Language::current();
        $config = App::config('languages');
        $prefix = $config[$lang]['prefix'] ?? '';
        if ($prefix && str_starts_with($uri, $prefix)) {
            $uri = substr($uri, strlen($prefix)) ?: '/';
        }

        // Normalize: remove trailing slash (except root)
        if ($uri !== '/' && str_ends_with($uri, '/')) {
            $uri = rtrim($uri, '/');
        }

        foreach (self::$routes as $route) {
            if ($route['method'] !== $method) continue;

            $pattern = self::buildPattern($route['path']);
            if (preg_match($pattern, $uri, $matches)) {
                $params = array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY);
                self::callAction($route['action'], $params);
                return;
            }
        }

        http_response_code(404);
        View::render('errors/404');
    }

    private static function addRoute(string $method, string $path, string $action): void
    {
        $fullPath = self::$groupPrefix . $path;
        // Normalize: remove trailing slash (except root)
        if ($fullPath !== '/' && str_ends_with($fullPath, '/')) {
            $fullPath = rtrim($fullPath, '/');
        }

        self::$routes[] = [
            'method' => $method,
            'path' => $fullPath,
            'action' => $action,
        ];
    }

    private static function buildPattern(string $path): string
    {
        $pattern = preg_replace('/\{(\w+)\}/', '(?P<$1>[^/]+)', $path);
        return '#^' . $pattern . '$#';
    }

    private static function callAction(string $action, array $params): void
    {
        [$controllerName, $method] = explode('@', $action);

        // Resolve controller namespace
        if (str_starts_with($controllerName, 'Admin\\')) {
            $class = 'Admin\\' . substr($controllerName, 6);
        } else {
            $class = 'App\\Controllers\\' . $controllerName;
        }

        if (!class_exists($class)) {
            throw new \RuntimeException("Controller not found: $class");
        }

        $controller = new $class();
        if (!method_exists($controller, $method)) {
            throw new \RuntimeException("Method $method not found in $class");
        }

        call_user_func_array([$controller, $method], $params);
    }
}
