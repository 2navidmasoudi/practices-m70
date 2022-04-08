<?php

require "Validation.php";

$strictMode = 0;

// $input = "2navidmasoudigmail.com";
// $validation_array = ['email'];

// $input = "4580231848";
// $validation_array = ['NATIONAL_CODE', 'number', 'asdas', '123a'];

// $input = "+989106255595";
// $validation_array = ['phone', 'number'];

$input = "Navid Masoudi";
$validation_array = ['alpha'];

$input = "Navid1nF1NiTy";
$validation_array = ['num_alpha'];

$input = "Navid1nF1NiTy";
$validation_array = ["qweasdzxc", "9", "number", "phone"];

$result = Validation::validate($input, $validation_array, $strictMode);

var_dump($result);
