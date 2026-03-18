<?php
/**
 * PSR-4 style autoloader
 */

spl_autoload_register(function (string $class) {
    $map = [
        'Core\\' => ROOT_PATH . '/core/classes/',
        'App\\Controllers\\' => ROOT_PATH . '/app/controllers/',
        'App\\Models\\' => ROOT_PATH . '/app/models/',
        'Admin\\' => ROOT_PATH . '/admin/controllers/',
    ];

    foreach ($map as $prefix => $baseDir) {
        $len = strlen($prefix);
        if (strncmp($prefix, $class, $len) === 0) {
            $relativeClass = substr($class, $len);
            $file = $baseDir . str_replace('\\', '/', $relativeClass) . '.php';
            if (file_exists($file)) {
                require_once $file;
                return;
            }
        }
    }
});

// Load helper functions
require_once ROOT_PATH . '/core/helpers/functions.php';
