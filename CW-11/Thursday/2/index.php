<?php

spl_autoload_register(function ($className) {
    include "classes/" . str_replace("\\", "/", $className) . ".php";
});

$tripHandler = TripHandler::getInstance();

$params1 = new TripParam(2, 3, true, false);
echo $tripHandler->calcPrice("economic", $params1);
