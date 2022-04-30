<?php

/*
5.Write a PHP script to remove nonnumeric characters except comma and dot.
    Sample string : '$123,34.00A'
    Expected Output : 12,334.00
*/

// $str = readline();
$str = '$123,34.00A';
$pattern = "/[^\d,.]/";

$str = preg_replace($pattern, '', $str);
// or
// $str = preg_filter($pattern, '', $str);

echo $str;
