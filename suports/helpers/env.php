<?php

use Dotenv\Dotenv;

if (!function_exists('hasFileEnv')) {
    function hasFileEnv(): bool
    {
        $path = __DIR__ . '/../.env';
        
        $has = file_exists($path) ? true : false;

        return $has;
    }
};

if (file_exists(__DIR__ . '/../../.env')) {
    $dotenv = Dotenv::createUnsafeImmutable(__DIR__ . '/../../');
    $dotenv->load();
}

if (!function_exists('env')) {
    function env($key): string
    {
        if (isset($_ENV[$key])) {
            $env = $_ENV[$key];
        } else {
            $env = '';
        };

        return $env;
    }
};
