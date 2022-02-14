<?php

# To test this function, simply run "php test/3.php"

function replace_maktab(&$str, $replace, $subject)
{
    $str = str_replace($replace, $subject, $str);
    echo $str;
}
