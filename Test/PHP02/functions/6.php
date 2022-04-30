<?php

/*
6. Write a PHP function that checks whether a passed string is a palindrome or not? A palindrome is a word, phrase, or sequence that reads the same backward as forward.
*/

// this will execute everything in 3.php
// require "3.php";

$input = readline();

function reverse_string($str)
{
    $result = '';
    for ($i = strlen($str) - 1; $i >= 0; $i--) {
        $result .= $str[$i];
    }
    return $result;
}

function is_palin($str)
{
    if ($str == reverse_string($str)) {
        return true;
    }
    return false;
}

if (is_palin($input))
    echo "All palindrome";
else
    echo "Not palindrome";
