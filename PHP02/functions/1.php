<?php

/*
1. Write a function to calculate the factorial of a number (a non-negative integer). The function accepts the number as an argument.
*/

$value = readline();

/*
    for solution
*/
// function factorial(int $var)
// {
//     $result = 1;
//     for ($i = $var; $i > 0; $i--) {
//         $result *= $i;
//     }
//     return $result;
// }

/*
    recursive function solution
*/
function factorial($var)
{
    if ($var == 1) return 1;
    return $var * factorial($var - 1);
}

echo factorial($value);

/*
    Another example of recursive functions: fibonacci
*/

// 1 1 2 3 5 8 13

// function fib($n)
// {
//     if ($n == 1 || $n == 2) return 1;
//     return fib($n - 1) + fib($n - 2);
// }
// echo fib($value);
