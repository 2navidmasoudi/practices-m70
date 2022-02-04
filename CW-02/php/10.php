<?php

/*
10.Write a PHP script to delete a specific value from an array using array_filter() function.
1st array : ('c1' => 'Red', 'c2' => 'Green', 'c3' => 'White', c4 => 'Black')
2nd array : ('Red', 'Green')
*/

$arr = array('c1' => 'Red', 'c2' => 'Green', 'c3' => 'White', 'c4' => 'Black');
$filterArrray = array('Red', 'Green');
$given_value = "Red";
$fun = function ($var) use ($filterArrray) {
    foreach ($filterArrray as $value) {
        if ($value == $var) {
            return false;
        }
    }
    return true;
};
// $filteredArray = array_filter($arr, 'filter');
$filteredArray = array_filter($arr, fn ($var) => $var != "Red");
$filteredArray = array_filter($arr, $fun);
print_r($filteredArray);
