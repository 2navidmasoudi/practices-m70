<?php

function replace_maktab(&$str, $replace, $subject)
{
    $str = str_replace($replace, $subject, $str);
    echo $str;
}
