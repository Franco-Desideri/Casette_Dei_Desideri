<?php

define('DB_NAME', 'casette_db');
define('DB_USER', 'tuo_username');
define('DB_PASS', 'tua_password');
define('DB_HOST', '127.0.0.1');

return [
    'dbname'   => DB_NAME,
    'user'     => DB_USER,
    'password' => DB_PASS,
    'host'     => DB_HOST,
    'driver'   => 'pdo_mysql',
    'charset'  => 'utf8mb4',
];
