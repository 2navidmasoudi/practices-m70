<?php

/*
Write a PHP script to filter out some elements with certain key-names.
Test Data :
1st array : ('c1' => 'Red', 'c2' => 'Green', 'c3' => 'White', c4 => 'Black')
2nd array : ('c2', 'c4')
Output :
Array
(
[c1] => Red
[c3] => White
)
*/

$arr = array('c1' => 'Red', 'c2' => 'Green', 'c3' => 'White', 'c4' => 'Black');
$filterArray = array('c2', 'c4');

foreach ($filterArray as $filterKey) {
    unset($arr[$filterKey]);
}

print_r($arr);
