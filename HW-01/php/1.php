<?php

# https://quera.org/problemset/3429/

$t = readline();

if ($t > 100) {
    // higher than 100
    echo "Steam";
} else if ($t < 0) {
    // lower than 0
    echo "Ice";
} else {
    // between 0 and 100 (+ 0 and 100)
    echo "Water";
}
