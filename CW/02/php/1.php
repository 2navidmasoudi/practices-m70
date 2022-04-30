<?php
/*
 1.Write a PHP script to show how many times an expression repeated in a sentence.
    Sample string : 'Life is beautiful depending on how you look at life';  
    expression: life
    Expected Output : 2
*/

// $str = readline();
$str = "Life is beautiful depending on how you look at life";
// $word = readline();
$word = "life";

// first method using regex
echo preg_match_all("/$word/i", $str);
echo "\n";
echo substr_count(strtolower($str), $word);
