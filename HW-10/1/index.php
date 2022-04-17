<?php

include "include/autoload.php";

system('stty cbreak -echo');
$stdin = fopen('php://stdin', 'r');
echo php_uname("s");
echo PHP_OS;

echo "\u{1f6fb}";
system('stty cbreak');

while ($c = ord(fgetc($stdin))) {
    Terminal::clear();
    echo ":smiley:";
    echo json_decode('"\uD83D\uDE00"');
    echo "Char read: $c\n";
}
// 🚓
