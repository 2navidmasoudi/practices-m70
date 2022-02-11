<?php


function pointInCircle($circle, $point)
{
    [$x, $y] = $point;
    [$xc, $yc, $r] = $circle;
    $dis = sqrt(pow($x - $xc, 2) + pow($y - $yc, 2));
    return $dis <= $r;
}

$c1 = explode(" ", readline("Circle 1 (x y r): "));
$c2 = explode(" ", readline("Circle 2 (x y r): "));
$c3 = explode(" ", readline("Circle 3 (x y r): "));
$dot = explode(" ", readline("Dot (x y): "));

$DinC1 = pointInCircle($c1, $dot);
$DinC2 = pointInCircle($c2, $dot);
$DinC3 = pointInCircle($c3, $dot);

if (!$DinC1 && !$DinC2 && !$DinC3) echo 1;
if ($DinC1 && !$DinC2 && !$DinC3) echo 2;
if (!$DinC1 && $DinC2 && !$DinC3) echo 3;
if ($DinC1 && $DinC2 && !$DinC3) echo 4;
if (!$DinC1 && !$DinC2 && $DinC3) echo 5;
if ($DinC1 && !$DinC2 && $DinC3) echo 6;
if (!$DinC1 && $DinC2 && $DinC3) echo 7;
if ($DinC1 && $DinC2 && $DinC3) echo 8;
