<?php

// echo "Hello World!";
# This is a comment
/*
Multiline comment
$lastname = "Masoudi"; */

$a = 10;
$b = 'Navid';
$c = 1.0;
$d = true;
$e = "$b Masoudi \"";

$b = 15;
$c = 10;

if ($a == 10)
    echo "a is 10 ";
else
    echo "a is not 10 ";

if ($b) {
    // for more lines...
    echo $b;
} else {
    echo 'no b';
}

echo "\r \r";

// 0 and "" is always false

for ($i = 0; $i < 20; $i++) {
    if ($i === 10) break;
    echo $i . " ";
}

echo "\n";

for ($i = 9; $i >= 0; $i--) {
    echo $i . " ";
}

echo "\n";
