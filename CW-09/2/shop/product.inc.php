<?php

class Product
{
    protected string $name;
    protected int $price;
    protected array $options;

    public function __construct(string $name, int $price, array $options)
    {
        // TODO
    }

    // TODO
}

class Shirt extends Product
{
    private string $size;

    // TODO
}

class Pants extends Product
{
    private int $size;

    // TODO
}
