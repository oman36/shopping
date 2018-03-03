<?php

return call_user_func(function () {

    $settings = require __DIR__ . '/.env.php';
    $db = $settings['db'];
    $params = [
        'paths' => [
            'migrations' => 'app/migrations',
            'seeds' => 'app/seeds',
        ],
        'environments' => [
            'default_migration_table' => 'phinxlog',
            'default_database' => 'dev',
            'dev' => [
                'adapter' => 'mysql',
                'host' => $db['hostname'],
                'name' => $db['basename'],
                'user' => $db['username'],
                'pass' => $db['password'],
                'port' => '3306',
                'charset' => 'utf8'
            ],
        ]
    ];

    foreach ($params['paths'] as $path) {
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
    }

    return $params;
});
