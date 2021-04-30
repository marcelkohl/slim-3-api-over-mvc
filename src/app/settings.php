<?php
return [
    'settings' => [
        // comment this line when deploy to production environment
        'displayErrorDetails' => true,

        // View settings
        'view' => [
            'template_path' => __DIR__ . '/Templates',
            'twig' => [
                'cache' => __DIR__ . '/../storage/cache/twig',
                'debug' => true,
                'auto_reload' => true,
            ],
        ],

        // DB settings
        'db' => [
            'host' => getenv("MYSQL_HOST"),
            'port' => getenv("MYSQL_PORT"),
            'dbname' => getenv("MYSQL_DATABASE"),
            'user' => getenv("MYSQL_USER"),
            'pass' => getenv("MYSQL_PASSWORD"),
        ],

        // monolog settings
        'logger' => [
            'name' => "app-name-here",
            'path' => __DIR__ . '/../storage/logs/app.log',
        ],
    ],
];
