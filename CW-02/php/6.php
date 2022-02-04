<?php

/*
6. Write a PHP script to remove all characters from a string except a-z A-Z 0-9 or " ".
    Sample string : abcde$ddfd @abcd )der]  
    Expected Result : abcdeddfd abcd der
*/

// $str = readline();
$str = 'abcde$ddfd @abcd )der]';
$pattern = "/[^a-zA-Z0-9\s]/";

$str = preg_replace($pattern, '', $str);
// or
// $str = preg_filter($pattern, '', $str);

echo $str;
