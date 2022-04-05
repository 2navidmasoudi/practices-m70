<?php

class Cart
{

    // Array of CartItem 
    private array $items = [];

    /**
     * Add Product $product into cart. If product already exists inside cart
     * it must update quantity.
     * This must create CartItem and return CartItem from method
     * Bonus: $quantity must not become more than whatever
     * is $availableQuantity of the Product
     *
     * @param Product $product
     * @param int $quantity
     * @return CartItem
     */
    public function addProduct(Product $product, int $quantity): CartItem
    {
        foreach ($this->items as $cartItem) {
            // if ($product == $cartItem->getProduct()) {
            if ($product->getId() == $cartItem->getProduct()->getId()) {

                for ($i = 0; $i < $quantity; $i++) {
                    $cartItem->increaseQuantity();
                }

                return $cartItem;
            }
        }

        $cartItem = new CartItem($product, $quantity);
        $this->items[] = $cartItem;
        return $cartItem;
    }

    /**
     * Remove product from cart
     *
     * @param Product $product
     */
    public function removeProduct(Product $product)
    {
        foreach ($this->items as $key => $cartItem) {
            // if ($product == $cartItem->getProduct()) {
            if ($product->getId() == $cartItem->getProduct()->getId()) {
                unset($this->items[$key]);
            }
        }
    }

    /**
     * This returns total number of products added in cart
     *
     * @return int
     */
    public function getTotalQuantity(): int
    {
        return array_reduce(
            $this->items,
            fn ($carry, $cartItem) => $carry + $cartItem->getQuantity(),
            0
        );
    }

    /**
     * This returns total price of products added in cart
     *
     * @return float
     */
    public function getTotalSum(): float
    {
        return array_reduce(
            $this->items,
            fn ($carry, $cartItem) =>
            $carry + $cartItem->getProduct()->getPrice() * $cartItem->getQuantity(),
            0
        );
    }
    /**
     * 
     * @return array
     */
    function getItems(): array
    {
        return $this->items;
    }

    /**
     * 
     * @param array $items 
     * @return Cart
     */
    function setItems(array $items): self
    {
        $this->items = $items;
        return $this;
    }
}
