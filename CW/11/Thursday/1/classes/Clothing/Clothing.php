<?php

namespace Clothing;

use Discount\Strategy;
use Discount\Summer;

class Clothing
{
    protected string $name;
    protected string $season;
    protected float $basePrice;

    
    protected Strategy $discountStrategy;

    public function __construct($name, $season, $basePrice)
    {
        $this->name = $name;
        $this->season = $season;
        $this->basePrice = $basePrice;
    }

    public function setDiscountStrategy(Strategy $discountStrategy)
    {
        $this->discountStrategy = $discountStrategy;
    }

    public function getPrice(): float
    {
        return isset($this->discountStrategy)
            ? $this->discountStrategy->priceByDiscount($this)
            : $this->basePrice;
    }

    public function getBasePrice(): float
    {
        return $this->basePrice;
    }

    public function getSeason(): string
    {
        return $this->season;
    }
}
