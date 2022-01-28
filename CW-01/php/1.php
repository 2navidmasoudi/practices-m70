<?php

# https://quera.org/problemset/51865/

// Score
// $x = 19;
$x = readline();
// Days off
// $n = 6;
$n = readline();

if ($n == 0) {
    // no days off
    echo 20;
} else if ($n <= 7) {
    // les than 7 days off
    echo $x;
} else if ($n > $x) {
    // more than the score 
    echo 0;
} else {
    // diffrence score and days off
    echo $x - $n;
}
