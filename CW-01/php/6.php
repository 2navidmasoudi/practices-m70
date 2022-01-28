<?php

# https://quera.org/problemset/9774/

$input = readline();
$number = str_split($input);
foreach ($number as $n) {
    echo "$n: ";
    for ($i = 0; $i < $n; $i++) {
        echo $n;
    }
    echo "\n";
}
