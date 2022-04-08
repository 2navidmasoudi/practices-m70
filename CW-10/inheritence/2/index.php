<?php

require "Person.php";
require "Compare.php";

$person1 = new Person(3000, [1000, 450]);
$person2 = new Person([25000, 6000], [1000, 550]);

echo "Person1 Money: " . $person1->getBalance() . PHP_EOL;
echo "Person2 Money: " . $person2->getBalance() . PHP_EOL;

Compare::compare($person1, $person2) . PHP_EOL;
