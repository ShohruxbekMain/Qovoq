<?php
/**
 * Create By:  PhpStorm
 * Project:    Qovoq.local
 * Developer:  Shohrux
 * Date:       07.10.2024
 * Time:       16:14
 */


/**
 * Create By:  PhpStorm
 * Project:    Qovoq.local
 * Developer:  Shohrux
 * Date:       21.09.2024
 * Time:       07:20
 */

use app\core\Application;

require_once __DIR__ . '/vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$config = [
    'db' => [
        'dsn' => $_ENV['DB_DSN'],
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD'],
    ]
];

$app = new Application(__DIR__, $config);

$app->db->applyMigrations();