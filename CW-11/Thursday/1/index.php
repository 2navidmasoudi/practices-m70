<?php





$shirt1->setDiscountStrategy(new Winter);

echo $shirt1->getPrice() . PHP_EOL;

// $shirt2 = new Shirt("Shirt2", "winter", 150);

// $socks1 = new Socks("Socks1", "summer", 20);
// $socks2 = new Socks("Socks2", "winter", 25);

// $pants1 = new Pants("Pants1", "summer", 20);
// $pants2 = new Pants("Pants2", "winter", 25);

$jacket1 = new Jacket("Jacket1", "summer", 100);
$jacket1->setDiscountStrategy(new Summer);
echo $jacket1->getPrice() . PHP_EOL;

// $jacket2 = new Jacket("Jacket2", "winter", 25);

// $shop = new Shop();
