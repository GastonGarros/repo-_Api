<?php

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

return
[
    'paths' => [
        'migrations' => '%%PHINX_CONFIG_DIR%%/db/migrations',
        'seeds' => '%%PHINX_CONFIG_DIR%%/db/seeds'
    ],
    'environments' => [
        'default_migration_table' => 'phinxlog',
        'default_environment' => 'development',
        'production' => [
            'adapter' => 'mysql',
            'host' => env('DATABASE_HOST'),
            'name' => env('DATABASE_NAME'),
            'user' => env('DATABASE_USER'),
            'pass' => env('DATABASE_PASS'),
            'port' => env('DATABASE_PORT'),
            'charset' => 'utf8',
        ],
        'development' => [
            'adapter' => 'mysql',
            'host' => env('DATABASE_HOST'),
            'name' => env('DATABASE_NAME'),
            'user' => env('DATABASE_USER'),
            'pass' => env('DATABASE_PASS'),
            'port' => env('DATABASE_PORT'),
            'charset' => 'utf8',
        ],
        'testing' => [
            'adapter' => 'mysql',
            'host' => env('DATABASE_HOST'),
            'name' => env('DATABASE_NAME'),
            'user' => env('DATABASE_USER'),
            'pass' => env('DATABASE_PASS'),
            'port' => env('DATABASE_PORT'),
            'charset' => 'utf8',
        ]
    ],
    'version_order' => 'creation'
];
