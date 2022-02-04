<?php

/*
4. Write a PHP script to split a date in to component (use preg_split).
    Sample string : ‘2020-01-01 00:00:00’
    Expected Output : Array(
                        [0] => 2020
                        [1] => 01
                        [2] => 01
                        [3] => 00
                        [4] => 00
                        [5] => 00
                    )
*/

$date = "2020-01-03 11:23:59";
$pattern = "/[-\s:]/";
$components = preg_split($pattern, $date);
print_r($components);

# https://www.w3schools.com/php/func_regex_preg_split.asp