<?php

spl_autoload_register(function ($className) {
    include "classes/" . str_replace("\\", "/", $className) . ".php";
});

$tripHandler = TripHandler::getInstance();

$params1 = new TripParam(2, 3, true, false);
$params2 = new TripParam(3, 4, true, true);

echo $tripHandler->calcPrice("economic", $params1);
echo PHP_EOL;
echo $tripHandler->calcPrice("bike", $params2);
