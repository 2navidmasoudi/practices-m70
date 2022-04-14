<?php

namespace Discount;

interface Strategy
{
    public function priceByDiscount(\Clothing\Clothing $clothing): float;
}
