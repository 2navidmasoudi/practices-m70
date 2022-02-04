<?php

/*
Write a PHP script to get the shortest/longest string length from an array. 
Sample arrays : ("abcd","abc","de","hjjj","g","wer")
Expected Output : The shortest array length is 1. The longest array length is 4.
*/

$arr = array("abcd", "abc", "de", "hjjj", "g", "wer");
$min = 1000;
$max = 0;
foreach ($arr as $str) {
    if (strlen($str) < $min) {
        $min = strlen($str);
    }
    if (strlen($str) > $max) {
        $max = strlen($str);
    }
}
echo "The shortest array length is $min. The longest array length is $max.";
// or
$lengths = array_map('strlen', $data);
$min = min($lengths);
$max = max($lengths);
echo "The shortest array length is $min. The longest array length is $max.";
