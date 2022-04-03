<?php

declare(strict_types=1);

include "math.class.php";

$instance = new MathOperation(3, 2, 3);

echo $instance->sum() . PHP_EOL;
echo $instance->product() . PHP_EOL;
// $instance->sample = 5; // Throws error
