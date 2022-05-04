<?php

function rand_str($n)
{
    $str = [...range('a', 'z'), ...range('A', 'Z'), ...range(0, 9)];
    $rand_text = "";
    for ($i = 0; $i < $n; $i++) {
        $rand_text .= $str[rand(0, count($str) - 1)];
    }
    return $rand_text;
}
