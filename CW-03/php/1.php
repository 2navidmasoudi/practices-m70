<?php

function divisors($num)
{
    $arr = [];
    for ($i = 1; $i <= $num; $i++) {
        if ($num % $i == 0) {
            $arr[] = $i;
        }
    }
    return $arr;
}

$a = (int) readline();
$b = (int) readline();

for ($i = $a; $i <= $b; $i++) {
    echo "divisors of ($i): " . implode(" ", divisors($i)) . "\n";
}
