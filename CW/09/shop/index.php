<?php

// include_once "classes/product.class.php";
include_once "classes/pants.class.php";
include_once "classes/shirt.class.php";
include_once "classes/shop.class.php";

$pants1 = new Pants('Lee', 399, ['khafan', 'pare', 'abi', 'sangshoor']);
$pants1->setSize(42);

$shop = new Shop();

$shop->addProduct($pants1, 5);

$shop->sell(1);
$shop->sell(1);

print_r($shop);
