<?php

namespace AutoMobile\Lamborghini;

use AutoMobile\Car;
use AutoMobile\Fuel;
use AutoMobile\Handling;
use AutoMobile\Speed;

class Huracan extends Car
{
    private $fuelConsumption = 12;
    private $increaseRatio = 1.5;
    use Fuel, Handling, Speed;
}
