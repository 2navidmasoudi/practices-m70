<?php

function pointInCircle($circle, $point)
{
    [$x, $y] = $point;
    [$xc, $yc, $r] = $circle;
    $dis = sqrt(pow($x - $xc, 2) + pow($y - $yc, 2));
    // return $dis <= $r;
    return $dis <= $r ? 1 : 0;
}

$c1 = explode(" ", readline("Circle 1 (x y r): "));
$c2 = explode(" ", readline("Circle 2 (x y r): "));
$c3 = explode(" ", readline("Circle 3 (x y r): "));
$dot = explode(" ", readline("Dot (x y): "));

$DinC1 = pointInCircle($c1, $dot);
$DinC2 = pointInCircle($c2, $dot);
$DinC3 = pointInCircle($c3, $dot);

// for test
// $DinC1 = 1;
// $DinC2 = 0;
// $DinC3 = 1;

/***** Too many if! not good *************
if (!$DinC1 && !$DinC2 && !$DinC3) echo 1;
if ($DinC1 && !$DinC2 && !$DinC3) echo 2;
if (!$DinC1 && $DinC2 && !$DinC3) echo 3;
if ($DinC1 && $DinC2 && !$DinC3) echo 4;
if (!$DinC1 && !$DinC2 && $DinC3) echo 5;
if ($DinC1 && !$DinC2 && $DinC3) echo 6;
if (!$DinC1 && $DinC2 && $DinC3) echo 7;
if ($DinC1 && $DinC2 && $DinC3) echo 8;
 ****************************************/

/******** my way for random areas *******
$Areas = [1, 5, 3, 7, 2, 6, 4, 8];
$bin = bindec($DinC1 . $DinC2 . $DinC3);
echo $Areas[$bin];

// 000 1
// 001 5
// 010 3 
// 011 7
// 100 2
// 101 6
// 110 4
// 111 8
 ***************************************/

$area = pow(1, $DinC1) + pow(2, $DinC2) + pow(4, $DinC3) + 1;
echo $area;

// 1 2 4 +1
/*********
// 0 0 0 1
// 1 0 0 2
// 0 1 0 3 
// 1 1 0 4
// 0 0 1 5
// 1 0 1 6
// 0 1 1 7
// 1 1 1 8
 *********/
