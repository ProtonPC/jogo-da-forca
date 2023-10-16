<?php

if (!function_exists('constants')) {
    function constants(string $key)
    {
        $config = [
            'BASE_DIR' => __DIR__,
            'DB_DATABASE' => $_ENV['DB_DATABASE'] ?? 'mysql',
            'DB_HOST' => $_ENV['DB_HOST'] ?? 'localhost',
            'DB_PORT' => $_ENV['DB_PORT'] ?? '3306',
            'DB_NAME' => $_ENV['DB_NAME'] ?? 'jogodaforcadb',
            'DB_USER' => $_ENV['DB_USER'] ?? 'root',
            'DB_PASSWORD' => $_ENV['DB_PASSWORD'] ?? '',
        ];
        return $config[$key];
    }
}
