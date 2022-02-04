<?php

/*
3. Write a PHP script to compress Strings:
    Input: naser erfani is so optimistic
    Output: nasererfanisoptimistic

    Input: Sample please sade bashe
    Output: Samplasesadebashe
*/

// $str = "naser erfani is so optimistic";
$str = readline();

foreach (explode(" ", $str) as $word) {
    echo $word;
}
