<?php

// $input = readline();
$input = "Fundamental To Programming";

// lowering all charecters
$input = strtolower($input);
// removing spaces
$input = str_replace(" ", "", $input);

// str_split($input) change string to array
// array_count_values($array) count repeataion of elements and unique them.
$count_array = array_count_values(str_split($input));

// writing unique chars
foreach ($count_array as $char => $repeat) {
    echo $char;
}
echo " ";
// writing unique char and the repeat
foreach ($count_array as $char => $repeat) {
    echo $char . $repeat;
}
