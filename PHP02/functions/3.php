<?php

/*
3. Write a function to reverse a string.
*/

// built-in function => strrev()

$input = readline();

function reverse_string($str)
{
    $result = '';
    for ($i = strlen($str) - 1; $i >= 0; $i--) {
        $result .= $str[$i];
    }
    return $result;
}

echo reverse_string($input);
