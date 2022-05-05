<?php

use app\controllers\SiteController;
use app\core\Application;

include_once __DIR__ . "/../vendor/autoload.php";

$app = new Application(dirname(__DIR__));

$siteController = new SiteController;

$app->router->get('/', [$siteController, 'home']);
$app->router->get('/contact', [$siteController, 'contact']);
$app->router->post('/contact', [$siteController, 'handleContact']);

$app->run();
