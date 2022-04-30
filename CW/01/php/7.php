<?php

# https://quera.org/problemset/3409/

$n = readline();

for ($i = 1; $i <= $n; $i++) {
    for ($j = 1; $j <= $n; $j++) {
        echo $i * $j . " ";
    }
    echo "\n";
}
