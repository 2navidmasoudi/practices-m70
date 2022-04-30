<?php

namespace AutoMobile\Chevrolet;

use AutoMobile\Car;
use AutoMobile\Fuel;
use AutoMobile\Handling;

class Corvette extends Car
{
    private $fuelConsumption = 14;
    use Fuel, Handling;
}
