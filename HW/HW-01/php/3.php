<?php

# https://quera.org/problemset/17244/

// charge percent
$k = readline();

// time
$t = 0;

/*
    k+1% means we need k+1 minutes to charge from k% to k+1%
    if we want 1% we need 1 minutes
    if we want 2% we need 1 + 2
    if we want 3% we need 1 + 2 + 3
    so if we want k% we need 1 + 2 + ... + k
    it is qual to k(k+1)/2
*/

// for version
for ($i = 1; $i <= $k; $i++) {
    $t += $i;
}

// formula version
$t = $k * ($k + 1) / 2;

echo $t;
