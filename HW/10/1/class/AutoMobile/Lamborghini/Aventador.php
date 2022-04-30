<?php

namespace AutoMobile\Lamborghini;

use AutoMobile\Car;
use AutoMobile\Fuel;
use AutoMobile\Handling;
use AutoMobile\Speed;

class Aventador extends Car
{
    private $fuelConsumption = 10;
    private $increaseRatio = 1.2;
    use Fuel, Handling, Speed;
}
