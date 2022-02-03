<?php

$hf1 = explode(" ", readline());
$hf2 = explode(" ", readline());
// $hf1 = ["A", "A"];
// $hf2 = ["B", "B"];

if (
    $hf1[0] == $hf2[1] ||
    $hf1[1] == $hf2[0] ||
    $hf1[0] == $hf1[1] ||
    $hf2[0] == $hf2[1]
) {
    echo "Yes";
} else {
    echo "No";
}
