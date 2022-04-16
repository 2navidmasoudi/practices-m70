<?php

include "../vendor/autoload.php";

$provider = new BikeProvider;

$bikeStore = new BikeStore($provider);

$bike1 = $bikeStore->borrow();

$bikeStore->restore($bike1, true);

// print_r($bike1);
$bike2 = $bikeStore->borrow();
$bike3 = $bikeStore->borrow();

var_dump($bikeStore);
