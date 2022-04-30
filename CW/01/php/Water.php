<?php

# https://quera.org/contest/assignments/2607/problems/8473

$n = readline();
$a = explode(' ', readline());
$m = [];
$j = [];
$ans = 0;
$z = 0;
$save = 0;

$m[$n - 1] = $a[$n - 1];
$j[$n - 1] = $n - 1;

for ($i = $n - 2; $i >= 0; $i--) {
    $m[$i] = $m[$i + 1];
    $j[$i] = $j[$i + 1];
    if ($a[$i] > $m[$i + 1]) {
        $m[$i] = $a[$i];
        $j[$i] = $i;
    }
}

while ($z != $n - 1) {
    if ($m[$z + 1] < $a[$z]) {
        for ($i = $z + 1; $i < $j[$z + 1]; $i++)
            $ans += ($m[$z + 1] - $a[$i]);
        $z = $j[$z + 1];
    } else {
        for ($i = $z + 1; $i < $n; $i++) {
            if ($a[$i] >= $a[$z]) {
                $save = $i;
                break;
            }
        }
        for ($i = $z + 1; $i < $save; $i++)
            $ans += ($a[$z] - $a[$i]);
        $z = $save;
    }
}
echo $ans;
