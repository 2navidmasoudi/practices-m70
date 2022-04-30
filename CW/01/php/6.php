<?php

# https://quera.org/problemset/9774/

// $input = readline();
// $number = str_split($input);
// foreach ($number as $n) {
//     echo "$n: ";
//     for ($i = 0; $i < $n; $i++) {
//         echo $n;
//     }
//     echo "\n";
// }

// or

$n = (int) strrev(readline());
$len = strlen($n);
$temp = 0;
for ($i = 0; $i < $len; $i++) {
    $temp = $n % 10;
    $n /= 10;
    echo "$temp: ";
    for ($j = 0; $j < $temp; $j++) {
        echo $temp;
    }
    echo "\n";
}
