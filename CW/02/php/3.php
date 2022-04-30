<?php

/*
3. Write a PHP script to compress Strings:
    Input: naser erfani is so optimistic
    Output: nasererfanisoptimistic

    Input: Sample please sade bashe
    Output: Samplasesadebashe
*/

// $str = "naser erfani is so optimistic";
$str = "Sample ple please sade bashe";
$str = str_replace(" ", "", $str);
// $str = readline();
$pattern = "/(.+)\\1+/";
$str = preg_replace($pattern, "$1", $str);

echo $str;
