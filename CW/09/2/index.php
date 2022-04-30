<?php

include "shop/shop.inc.php";

$pants1 = new Pants('Pants1', 299, ['red', 'khafan', 'pare']);
$pants1->setSize(30);

$pants2 = new Pants('Pants2', 199, ['blue', 'lee', 'sade']);
$pants2->setSize(34);

$shirt1 = new Shirt('Shirt1', 59, ['blue', 'bahal', 'v', 'LC']);
$shirt1->setSize('xm');

$shirt2 = new Shirt('Shirt2', 79, ['white', 'LC', 'o']);
$shirt2->setSize('xm');

$shop = new Shop();

$shop->addProduct($pants1, 10);
$shop->addProduct($pants2, 20);
$shop->addProduct($shirt1, 15);
$shop->addProduct($shirt2, 25);

print_r($shop->getSuggestion('Shirt', 'xm', null, ['LC', 'blue']));

$shop->sell(1);

var_dump($shop);
