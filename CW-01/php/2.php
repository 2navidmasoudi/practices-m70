<?php

# https://quera.org/problemset/10230/

$x = 0;

for ($i = 0; $i < 3; $i++) {
    // Input 3 numbers and sum eachtime
    $x += readline();
}

if ($x == 180) {
    echo "yes";
} else {
    echo "no";
}
