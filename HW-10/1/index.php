<?php

include "include/autoload.php";

use AutoMobile\Lamborghini\{Aventador, Urus, Huracan}; // My favorite 👌
use AutoMobile\Chevrolet\{Camero, Corvette};
use AutoMobile\Ford\{Mustang, Shelby};
use AutoMobile\Irankhodro\{L90, Dena};

/**
 * NOTE: game will die everytime:
 * - you are out of fuel
 * - you win (reach destination)
 * 
 * Available cars listed above ☝️
 * 
 * Arguments for Cars 🏎️:
 * @param float $fuel
 * @param array $destination
 * Destination for car to reach etc.: [10,10]
 * @param array $destination [optional] default = [0,0]
 * Staring position for car etc.: [2,3]
 * 
 * Some cars have ability to change speed (setSpeed)
 * Give speed a positive number or you'll get an Exception.
 * Car will move * speed after setting speed (default speed = 1)
 *
 * GL HF! 😁
 */

# with speed change.
$aventador = new Aventador(500, [10, 10]);
$aventador->setSpeed(2);
$aventador->MoveDown(5)->MoveRight(5)->MoveUp(10);

# without speed change.
$urus = new Urus(500, [10, 10]);
// $urus->setSpeed(2);
$urus->MoveRight(10)->MoveUp(10);
