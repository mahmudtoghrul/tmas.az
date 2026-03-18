<?php
/**
 * Application Configuration
 */

return [
    'name' => 'TM Analytics & Strategy',
    'url' => 'https://tmas.az',
    'debug' => false,
    'timezone' => 'Asia/Baku',
    'charset' => 'UTF-8',

    // Supported languages: first is default
    'languages' => [
        'az' => ['name' => 'Azərbaycan', 'prefix' => ''],
        'ru' => ['name' => 'Русский', 'prefix' => '/ru'],
        'en' => ['name' => 'English', 'prefix' => '/en'],
    ],
    'default_language' => 'az',

    // Theme colors
    'theme' => [
        'primary' => '#1A2B5A',
        'accent' => '#C0A020',
        'white' => '#FFFFFF',
    ],
];
