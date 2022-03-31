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

class Shop
{
    private array $repo = [];
    private int $income = 0;

    public function addProduct(Product $product, int $count): bool
    {
        // TODO
        return false;
    }

    public function getSuggestion(string $type, mixed $size, int $maxPrice, array $options = []): array
    {
        // TODO
        return [];
    }

    public function sell(int $id): Product
    {
        // TODO
        return new Product('', '', []);
    }
}
