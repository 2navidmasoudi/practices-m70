<?php

include_once "product.inc.php";
include_once "shirt.inc.php";
include_once "pants.inc.php";

class Shop
{
    private array $repo = [];
    private int $income = 0;
    static int $id = 1;

    public function addProduct(Product $product, int $count): bool
    {
        if ($count <= 0)
            return false;

        $this->repo[] = [
            "id" => self::$id++,
            "type" => get_class($product),
            "product" => $product,
            "count" => $count,
        ];
        return true;
    }

    public function getSuggestion(string $type, mixed $size, int $maxPrice = null, array $options = []): array
    {
        $suggestion = array_filter(
            $this->repo,
            fn ($item) => $item['type'] == $type &&
                $item['count'] > 0 &&
                $size == $item['product']->getSize() &&
                (!isset($maxPrice) || $item['product']->getPrice() <= $maxPrice) &&
                (count($options) === 0 || count(array_intersect($item['product']->getOptions(), $options)) > 0)
        );
        return array_values($suggestion);
    }

    public function sell(int $id): Product
    {
        $find = array_search($id, array_column($this->repo, 'id'));
        $item = &$this->repo[$find];
        if ($item['count'] <= 0)
            throw new Exception('OUT OF THIS PRODUCT!');
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
