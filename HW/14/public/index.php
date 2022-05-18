<?php

use app\core\Application;
use app\controllers\AuthController;
use app\controllers\BaseController;
use app\controllers\PanelController;
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

$app->get('/', [BaseController::class, 'home']);
$app->get('/doctor/:id', [BaseController::class, 'doctor']);

// Completing Profile
$app->get('/profile', [BaseController::class, 'profile']);
$app->post('/profile', [BaseController::class, 'profile']);

// Login and register
$app->get('/login', [AuthController::class, 'login']);
$app->post('/login', [AuthController::class, 'login']);
$app->get('/register', [AuthController::class, 'register']);
$app->post('/register', [AuthController::class, 'register']);

// Show Panel for Manager or Doctor
$app->get('/panel', [PanelController::class, 'panel']);

// For Managers
$app->get('/panel/units', [PanelController::class, 'units']);
$app->post('/panel/units', [PanelController::class, 'units']);
$app->get('/panel/confirm', [PanelController::class, 'confirm']);
$app->get('/panel/confirm', [PanelController::class, 'confirm']);

// For Doctors
$app->get('/panel/work', [PanelController::class, 'work']);
$app->post('/panel/work', [PanelController::class, 'work']);

$app->run();
