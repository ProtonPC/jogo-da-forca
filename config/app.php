<?php

if (!function_exists('constants')) {
    function constants(string $key)
    {
        $config = [
            'BASE_DIR' => __DIR__,
            'DB_HOST' => 'localhost',
            'DB_PORT' => '3306',
            'DB_NAME' => 'jogo_da_forca',
            'DB_USER' => 'root',
            'DB_PASSWORD' => '',
        ];
        return $config[$key];
    }
}
