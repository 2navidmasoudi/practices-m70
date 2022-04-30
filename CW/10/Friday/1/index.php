<?php

require "Validation.php";


$strictMode = 0;
$input = "2navidmasoudi@gmail.com";
$validation_array = ['email'];

// $input = "4580231848";
// $validation_array = ['NATIONAL_CODE', 'number', 'asdas', '123a'];

// $input = "+989106255595";
// $validation_array = ['phone', 'number'];

// $input = "Navid Masoudi";
// $validation_array = ['alpha'];

// $input = "Navid1nF1NiTy";
// $validation_array = ['num_alpha', 'number', 'alpha'];

// $validation_array = ['phone', 'number', 'asd'];
$input = "Navid";
$validation_array = ["strlen(6-3)", "length{5}", "number", "phone"];

$result = Validation::validate($input, $validation_array, $strictMode);

var_dump($result);
