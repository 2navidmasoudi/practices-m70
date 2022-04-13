<?php

// spl_autoload_register(function($className) {
//     require $className . ".php";
// });

require "Parking.php";
require "Vehicle.php";
require "RentParking.php";

$parking = new Parking;

$car = new Car(400, 2);

$rent1 = $parking->addVehicle($car);

print_r($parking);
print_r($car);
print_r($rent1);