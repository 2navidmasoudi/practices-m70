<?php

namespace Discount;

use Clothing\Clothing;

interface Strategy
{
    public function priceByDiscount(Clothing $clothing): float;
}
