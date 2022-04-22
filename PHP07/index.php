<?php

// namespace ClassPath\PersonClass;

// namespace ClassPath\PersonClass {
//     require "auto/index.php";
//     $person = new Person;
//     $person->sayHello();
// }
// namespace ClassPath {
//     $new = new NewClass;
//     echo $new->number;
// }


// require "auto/index.php";

// Composer

require "vendor/autoload.php";

use ClassPath\PersonClass\Person;
use function ClassPath\PersonClass\N;

$person = new Person;
$person->sayHello();

// $time = new N;
// echo $time->number;
N();

// Salam
