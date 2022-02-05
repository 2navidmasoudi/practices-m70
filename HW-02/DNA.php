<?php

function expandDNA($DNA)
{
    $DNA = strtolower($DNA);
    $numberPattern = "/\d/";
    if (!preg_match($numberPattern, $DNA)) {
        // we dont have any numbers.
        // so we dont need to execute rest of the function.
        return $DNA;
    }

    $DNA_array = [];
    $pattern = "/(?:[a-z]|\d+)/";
    preg_match_all($pattern, $DNA, $DNA_array);
    // print_r($DNA_array);
    // preg_match_all makes $DNA_array with only 1 array inside... so...
    $DNA_array = $DNA_array[0];

    // changing numbers into charecters...
    for ($i = 1; $i < count($DNA_array); $i++) {
        if (is_numeric($DNA_array[$i])) {
            $DNA_array[$i - 1] = str_repeat($DNA_array[$i - 1], $DNA_array[$i]);
            $DNA_array[$i] = null;
        }
    }

    // print_r(implode("", $DNA_array));
    return implode("", $DNA_array);
}
