<?php

/*
10.Write a PHP script to delete a specific value from an array using array_filter() function.
1st array : ('c1' => 'Red', 'c2' => 'Green', 'c3' => 'White', c4 => 'Black')
2nd array : ('Red', 'Green')
*/

$arr = array('c1' => 'Red', 'c2' => 'Green', 'c3' => 'White', 'c4' => 'Black');

// Simplest Way, Only filter out a specific value for eg: Red
$filterValue = "Red";
$newArray = array_filter($arr, fn ($var) => $var != $filterValue);
print_r($newArray);

// Second way, useing the function outside of array_filter, and call it in there
// also filter an array instead of a specific value eg: Red and Green
$filterArray = array('Red', 'Green');

// filterArray is undefined inside the $filterFunc so we add it with 'use'
$filterFunc = function ($var) use ($filterArray) {
    foreach ($filterArray as $value) {
        if ($value == $var) {
            return false;
        }
    }
    return true;
};

$newArray = array_filter($arr, $filterFunc);
print_r($newArray);
