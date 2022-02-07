<?php

/*
2. Write a function to check whether a number is prime or not.Note: A prime number (or a prime) is a natural number greater than 1 that has no positive divisors other than 1 and itself.
*/

$input = readline();

function is_prime($var)
{
    if ($var <= 1) return false;
    for ($i = 2; $i < sqrt($var); $i++) {
        if ($var % $i == 0) {
            return false;
            // no need to break;
        }
    }
    return true;
}

if (is_prime($input))
    echo "It is prime";
else
    echo "It is not prime";
