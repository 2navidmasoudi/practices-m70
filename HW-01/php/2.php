<?php

# https://quera.org/problemset/280/

// input 3 numbers in array
for ($i = 0; $i < 3; $i++) {
    $len[] = readline();
}

// we sort it to find 2 smaller input
sort($len);

// pow is power (num , exp)
if (pow($len[0], 2) + pow($len[1], 2) == pow($len[2], 2))
    echo "YES";
else
    echo "NO";
