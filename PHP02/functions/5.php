<?php

/*
5. Write a PHP function that checks whether a string is all lowercase.
*/

// built-in function is ctype_lower()
$input = readline();

function isLower($str)
{
    $pattern = "/[A-Z]/";
    if (preg_match($pattern, $str)) {
        return false;
    }
    return true;
}

if (isLower($input))
    echo "It is lowercase";
else
    echo "It is not lowercase";
