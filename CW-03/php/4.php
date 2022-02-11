<?php

function isPrime($n)
{
    for ($i = 2; $i <= sqrt($n); $i++) {
        if ($n % $i == 0) {
            return false;
        }
    }
    return true;
}

function primes($n)
{
    $pr = [];
    for ($i = 2; $i < $n / 2 + 1; $i++) {
        if (isPrime($i)) {
            $pr[] = $i;
        }
    }
    return $pr;
}

function findGoldbakh($n)
{
    $primeNumbers = primes($n);
    foreach ($primeNumbers as $pr) {
        if (isPrime($n - $pr)) {
            echo $pr . " " . $n - $pr . "\n";
        }
    }
}

$input = readline();
findGoldbakh($input);
