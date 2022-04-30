<?php

$obj_1 = array("one" => "One");
$obj_2 = array("one" => "One");

for ($i = 1; $i < 3; $i++) {
    foreach (${"obj_$i"} as $key => $value) {
        echo $key . $value . "\n";
    }
}
