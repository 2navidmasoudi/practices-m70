<?php

# https://quera.org/problemset/9773/

$n = readline();
// n % 2 is always 1

// str_repeat repeats an string x times
// str_repeat ($string, $times)

// for upper triangle
for ($i = 1; $i <= $n; $i += 2) {
    echo str_repeat(" ", ($n - $i) / 2)
        . str_repeat("*", $i)
        . str_repeat(" ", $n - $i)
        . str_repeat("*", $i)
        . "\n";
}

// for lower triangle
for ($i = $n - 2; $i >= 1; $i -= 2) {
    echo str_repeat(" ", ($n - $i) / 2)
        . str_repeat("*", $i)
        . str_repeat(" ", $n - $i)
        . str_repeat("*", $i)
        . "\n";
}
