<?php

/*
2. Write a PHP script that removes the last word from a string.
    Sample string : 'The quick brown fox'
    Expected Output : The quick brown
*/

// $str = readline();
$str = 'The quick brown fox';

$wordArray = explode(' ', $str);
array_pop($wordArray);

echo implode(" ", $wordArray);
