<?php

namespace AutoMobile\Ford;

use AutoMobile\Car;
use AutoMobile\Fuel;
use AutoMobile\Handling;
use AutoMobile\Speed;

class Shelby extends Car
{
    private $fuelConsumption = 16;
    private $increaseRatio = 2.1;
    use Fuel, Handling, Speed;
}
