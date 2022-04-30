<?php

$arr = array(1, 2, 3, 4, 5);

$user = [
    "name" => "navid",
    "last" => "masoudi",
];

$arrayKeys = array_keys($user);
$arrayValues = array_values($user);

foreach ($user as $key => $value) {
    echo "$key: $value\n";
}
// for only values
// foreach ($arr as $number) {
//     echo "$number\n";
// }

// foreach won't work in string...

$name = "navid";
$var = "name";

echo $$var; // Output: navid