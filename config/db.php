<?php

return [
    'dsn'      => 'mysql:host=127.0.0.1;dbname=framework',
    'username' => 'root',
    'password' => 'MySQL',
    'options'   => [
        \PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'",
        \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
    ],
];