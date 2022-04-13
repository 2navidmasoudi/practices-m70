<?php

// spl_autoload_register(function($className) {
//     require $className . ".php";
// });

require "Parking.php";
require "Vehicle.php";
require "RentParking.php";

$parking = new Parking("markazi", 8, 24, 560, 8, 70);

$car = new Car(400, 2);

$rent1 = $parking->addVehicle($car, "Monday", 25, 3, 17);
$rent2 = $parking->addVehicle($car, "Monday", 25, 3, 17);

$parking->info();
// print_r($parking);
// print_r($car);
// print_r($rent1);
