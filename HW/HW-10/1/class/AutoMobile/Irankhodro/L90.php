<?php

namespace AutoMobile\Irankhodro;

use AutoMobile\Car;
use AutoMobile\Fuel;
use AutoMobile\Handling;

class L90 extends Car
{
    private $fuelConsumption = 8;
    use Fuel, Handling;
}
