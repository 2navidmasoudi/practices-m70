<?php

spl_autoload_register(function ($className) {
    require str_replace("\\", "/", $className) . ".php";
});

use Vehicle\{Car, Bike, Motor};
// require "Floor.php";
// require "Parking.php";
// require "Vehicle.php";
// require "Rent.php";

// we define floors with
// elevation
// name
// capacity each.
$floors = [
    new Floor(1, "A", 70),
    new Floor(2, "B", 70),
    new Floor(3, "C", 70),
    new Floor(4, "D", 70),
    new Floor(5, "E", 70),
    new Floor(5, "F", 70),
    new Floor(7, "G", 70)
];

$parking = new Parking("markazi", 8, 24, $floors);

// Car with tag and weight
$car = new Car("12L566", 12);

// Motor with only tag (not so much weight so we ignore that)
$motor = new Motor("NS400");

// no tag or weight so we ignore both.
$bike = new Bike;

$rent1 = $parking->addVehicle($car, "Sunday", 25, 3, 17, 19);

$rent2 = $parking->addVehicle($car, "Monday", 25, 3, 17);
// rent3 is false now
$rent3 = $parking->addVehicle($car, "Monday", 25, 3, 17);

$rent4 = $motor->addToParking($parking, "Thursday", 24, 1, 9, 14);
$rent5 = $bike->addToParking($parking, "Monday", 24, 1, 9, 14);


// PASS FALSE OR NOTHING IF YOU DONT WANT INFO MESSAGE
echo "Rent(1)= " . $rent1->getPayment(true) . PHP_EOL;
echo "Rent(2)= " . $rent2->getPayment(true) . PHP_EOL;

// this code bellow throw errors because rent3 is false, no methods in it.
// echo "Rent(3)= " . $rent3->getPayment(true) . PHP_EOL;

echo "Rent(4)= " . $rent4->getPayment(true) . PHP_EOL;
echo "Rent(5)= " . $rent5->getPayment(true) . PHP_EOL;

echo "Parking income = " . $parking->getPayment() . PHP_EOL;

// get all parking slots info.
// $parking->info();

// print_r($parking);
// print_r($car);
// print_r($rent1);
