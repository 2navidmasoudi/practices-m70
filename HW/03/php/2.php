<?php

# To test this function, simply run "php test/2.php"

function strToLowerMaktab($str)
{

    /********** short version **********
    $from = range('a', 'z');
    $to = range('A', 'Z');
    return str_replace($from, $to, $str);
     ***********************************/

    for ($i = 0; $i < strlen($str); $i++) {
        // ord return the ASCII number of the charecter
        $ASCII = ord($str[$i]);
        if ($ASCII >= 65 && $ASCII <= 90) {
            // chr takes ASCII value and return the charecter.
            $str[$i] = chr($ASCII + 32);
        }
    }
    return $str;
}

/* This is why we add 32 to ASCII to lower it.
echo ord("A"); // 65
echo ord("a"); // 97  = 90 + 32
echo ord("Z"); // 90
echo ord("z"); // 122 = 90 + 32
*/