<?php

require "ClassItem.php";
require "Person.php";
require "Student.php";

$class = new ClassItem(1, 'Mathematics', 'best');
// set duration and days
$class->setDuration(2)->setDays(['Monday', 'Sunday']);

$class2 = new ClassItem(2, 'Science', 'exciting');
// set duration and days
$class2->setDuration(1)->setDays(['Saturday', 'Thursday']);


$student = new Student('ali', 'karami', 25);

$student->addClass($class)->addClass($class2);

var_dump($student->isStudentHasClass($class)); //true

$class3 = new ClassItem(3, 'Geo', 'meh...');
var_dump($student->isStudentHasClass($class3)); //false

// $student->removeClass($class);

print_r($student->classList());
//must like this
//[
//  ['id'=>1,'name'=>'Mathematics','description'=>'best','duration'=>1or2,'days'=>[]],
//  ['id'=>2,'name'=>'Science','description'=>'exciting','duration'=>1or2,'days'=>[]]
//]
