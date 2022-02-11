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

function findGoldbakh($n)
{
    for ($i = 2; $i <= $n / 2; $i++) {
        if (isPrime($i) && isPrime($n - $i))
            echo $i . " " . $n - $i . "\n";
    }
}

$input = readline();
findGoldbakh($input);
