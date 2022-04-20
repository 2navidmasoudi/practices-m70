<?php

namespace AutoMobile\Lamborghini;

use AutoMobile\Car;
use AutoMobile\Fuel;
use AutoMobile\Handling;

class Urus extends Car
{
    private $fuelConsumption = 12;
    use Fuel, Handling;
}
