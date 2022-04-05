<?php

class Shop
{
    private array $repo = [];
    private int $income = 0;
    private static $id = 1;

    public function addProduct(Product $product, int $count): bool
    {

        // $product->id = self::$id++;
        // $product->count = $count;
        $this->repo[] = [
            "id" => self::$id++,
            "product" => $product,
            "count" => $count,
        ];
        return false;
    }

    public function getSuggestion(string $type, mixed $size, int $maxPrice, array $options = []): array
    {
        // TODO
        return [];
    }

    public function sell(int $id): Product
    {
        $find = array_search($id, array_column($this->repo, 'id'));
        $item = &$this->repo[$find];
        $item['count']--;
        $this->income += $item['product']->getPrice();
        return $item['product'];
    }
    /**
     * 
     * @return int
     */
    function getIncome(): int
    {
        return $this->income;
    }
}
