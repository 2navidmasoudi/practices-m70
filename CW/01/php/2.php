<?php

# https://quera.org/problemset/10230/

$x = readline();
$y = readline();
$z = readline();

if ($x != 0 && $y != 0 && $z != 0 && $x + $y + $z == 180) {
    echo "yes";
} else {
    echo "no";
}
