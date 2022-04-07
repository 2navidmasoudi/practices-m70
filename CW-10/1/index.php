<?php

require "Shape.php";
require "Triangle.php";
require "Square.php";
require "Rectangle.php";

$triangle = new Triangle(3, 4);
$square = new Square(4);
$rectangle = new Rectangle(2, 5);

echo "Triangle Area: " . $triangle->getArea() . PHP_EOL;
echo "Triangle Area: " . $triangle->getPerimeter() . PHP_EOL;

echo "Square Area: " . $square->getArea() . PHP_EOL;
echo "Square Area: " . $square->getPerimeter() . PHP_EOL;

echo "Rectangle Area: " . $rectangle->getArea() . PHP_EOL;
echo "Rectangle Area: " . $rectangle->getPerimeter() . PHP_EOL;
