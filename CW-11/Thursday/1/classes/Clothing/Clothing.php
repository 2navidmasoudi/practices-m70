<?php

namespace Clothing;

class Clothing
{
    protected string $name;
    protected string $sutableSeason;
    protected float $basePrice;
    protected \Discount\Strategy $discountStrategy;

    public function __construct($name, $sutableSeason, $basePrice)
    {
        $this->name = $name;
        $this->sutableSeason = $sutableSeason;
        $this->basePrice = $basePrice;
    }

    public function setDiscountStrategy(\Discount\Strategy $discountStrategy)
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
        return $this->sutableSeason;
    }
}
