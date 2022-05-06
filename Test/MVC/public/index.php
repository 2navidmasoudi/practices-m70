<?php

use app\core\Application;
use app\controllers\SiteController;

include_once __DIR__ . "/../vendor/autoload.php";

$app = new Application(dirname(__DIR__));

$app->get('/', [SiteController::class, 'home']);
$app->get('/contact', [SiteController::class, 'contact']);
$app->post('/contact', [SiteController::class, 'handleContact']);

$app->run();
