<?php

include "../vendor/autoload.php";

$Provider = new BikeProvider();
$BikeStore = new BikeStore($Provider);
$Bike1 = $BikeStore->borrow();
$BikeStore->restore($Bike1, true);
// print_r($Bike1);
$bike2 = $BikeStore->borrow();
// $bike3 = $BikeStore->borrow();

var_dump($BikeStore);
