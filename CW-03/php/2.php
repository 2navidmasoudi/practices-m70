<?php


// function reverse_string($str)
// {
//     $result = '';
//     for ($i = strlen($str) - 1; $i >= 0; $i--) {
//         $result .= $str[$i];
//     }
//     return $result;
// }

// $isPalin = fn ($str) => $str == reverse_string($str);
$isPalin = fn ($str) => $str == strrev($str);

$input = readline();

if ($isPalin($input))
    echo "All palindrome";
else
    echo "Not palindrome";
