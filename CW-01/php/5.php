<?php

# https://quera.org/problemset/2551/

$a = readline();
$operator = readline();
$b = readline();

if ($operator == '+') {
    echo $a + $b;
} else if ($operator == '*') {
    echo $a * $b;
} else {
    echo 'Invalid operator';
}
