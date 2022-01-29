<?php

// types are optional
function Hello(string $name = "World!"): string
{
    return "Hello $name!";
}

echo Hello('Navid') . "\n";

function sum(...$nums)
{
    // $sum = 0;
    // foreach ($nums as $n) {
    //     $sum += $n;
    // }
    // return $sum;
    // or
    return array_reduce($nums, fn ($carry, $n) => $carry + $n);
}

echo sum(1, 2, 3, 4) . "\n";

$double = fn ($n) => 2 * $n;

echo $double(3);
