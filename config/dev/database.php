<?php
return [
    'fetch'       => PDO::FETCH_CLASS,
    'default'     => 'db',
    'connections' => [
        'db'  => [
            'driver'    => 'mysql',
            'host'      => env('DB_HOST', 'localhost'),
            'database'  => env('DB_DATABASE', 'ask'),
            'username'  => env('DB_USERNAME', 'root'),
            'password'  => env('DB_PASSWORD', '7232275'),
            'charset'   => 'utf8',
            'collation' => 'utf8_general_ci',
            'prefix'    => '',
            'strict'    => false,
        ],

        'ask' => [
            'driver'    => 'mysql',
            'host'      => env('DB_HOST', 'localhost'),
            'database'  => env('DB_DATABASE', 'ask'),
            'username'  => env('DB_USERNAME', 'root'),
            'password'  => env('DB_PASSWORD', '7232275'),
            'charset'   => 'utf8',
            'collation' => 'utf8_general_ci',
            'prefix'    => '',
            'strict'    => false,
        ],
    ],

    'redis'       => [
        'cluster' => false,
        'default' => [
            'host'     => '127.0.0.1',
            'port'     => 6379,
            'database' => 0,
        ],
    ],
];
