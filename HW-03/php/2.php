<?php

# To test this function, simply run "test/2.php"

function strToLowerMaktab($str)
{

    /********** short version **********
    $from = range('a', 'z');
    $to = range('A', 'Z');
    return str_replace($from, $to, $str);
     ***********************************/

    foreach ($str as $key => $value) {
        // ord return the ASCII number of the charecter
        $ASCII = ord($value);
        if ($ASCII >= 65 && $ASCII <= 90) {
            // chr takes ASCII value and return the charecter.
            $str[$key] = chr($ASCII + 32);
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