<?php

namespace AutoMobile\Ford;

use AutoMobile\Car;
use AutoMobile\Fuel;
use AutoMobile\Handling;
use AutoMobile\Speed;

class Mustang extends Car
{
    private $fuelConsumption = 18;
    private $increaseRatio = 1.8;
    use Fuel, Handling, Speed;
}
