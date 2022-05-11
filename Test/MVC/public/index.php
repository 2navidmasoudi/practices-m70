<?php

use app\controllers\AuthController;
use app\core\Application;
use app\controllers\SiteController;
use Dotenv\Dotenv;

include_once __DIR__ . "/../vendor/autoload.php";

$dotenv = Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$config = [
    'db' => [
        'dsn' => $_ENV['DB_DSN'],
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD'],
    ],
];

$app = new Application(dirname(__DIR__), $config);

$app->get('/', [SiteController::class, 'home']);
$app->get('/contact', [SiteController::class, 'contact']);
$app->post('/contact', [SiteController::class, 'handleContact']);

$app->get('/login', [AuthController::class, 'login']);
$app->post('/login', [AuthController::class, 'login']);
$app->get('/register', [AuthController::class, 'register']);
$app->post('/register', [AuthController::class, 'register']);


$app->run();
