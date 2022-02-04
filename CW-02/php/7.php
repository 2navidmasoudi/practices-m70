<?php

/*
7.Write a PHP script to change the following array's all values to both upper and lower case. 
Sample arrays :
$Color = array('A' => 'Blue', 'B' => 'Green', 'c' => 'Red');
Expected Output :
Values are in lower case.
Array ( [A] => blue [B] => green [c] => red ) 
Values are in upper case.
Array ( [A] => BLUE [B] => GREEN [c] => RED )
*/

$Color = [
    'A' => 'Blue',
    'B' => 'Green',
    'c' => 'Red',
];

echo "Values are in lower case.\n";
foreach ($Color as $key => $value) {
    $Color[$key] = strtoupper($value);
}
print_r($Color) . PHP_EOL;

echo "Values are in upper case.\n";
foreach ($Color as $key => $value) {
    $Color[$key] = strtolower($value);
}
print_r($Color);
