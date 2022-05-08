<?php

include_once __DIR__ . "/../vendor/autoload.php";

use App\controllers\SiteController;
use App\core\Application;

$app = new Application(dirname(__DIR__));

$app->get("/", [SiteController::class, "home"]);
$app->post("/", [SiteController::class, "toggleTodo"]);
$app->get("/todo", [SiteController::class, "addForm"]);
$app->post("/todo", [SiteController::class, "addTodo"]);
$app->post("/delete", [SiteController::class, "deleteTodo"]);

// $app->get("/about", function (Request $request) {
//     $data = $request->getBody();
//     var_dump($data);
//     return "About Us!";
// });

$app->run();
