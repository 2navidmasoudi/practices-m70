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

// or

// $n = strrev(readline());
// $t = 0;
// while ($n) {
//     $t = floor($n) % 10;
//     echo "$t: ";
//     for ($i = 0; $i < $t; $i++) {
//         echo $t;
//     }
//     echo "\n";
//     $n = floor($n) / 10;
//     if ($n == 0) break;
// }
