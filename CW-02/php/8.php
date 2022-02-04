<?php

/*
Write a PHP script to get the shortest/longest string length from an array. 
Sample arrays : ("abcd","abc","de","hjjj","g","wer")
Expected Output : The shortest array length is 1. The longest array length is 4.
*/

$arr = array("abcd", "abc", "de", "hjjj", "g", "wer");
$min = PHP_INT_MAX;
$max = 0;
foreach ($arr as $str) {
    $len = strlen($str);
    // if (strlen($str) < $min) {
    //     $min = strlen($str);
    // }
    $max = max($max, $len);
    // if (strlen($str) > $max) {
    //     $max = strlen($str);
    // }
    $min = min($min, $len);
}
// echo "The shortest array length is $min. The longest array length is $max." . PHP_EOL;
// or
$lengths = array_map('strlen', $arr);
// print_r($lengths) . PHP_EOL;
$min = min($lengths);
$max = max($lengths);
echo "The shortest array length is $min. The longest array length is $max.";
