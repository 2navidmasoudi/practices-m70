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
            if ($product->getId() == $cartItem->getProduct()->getId()) {

                // increase quantity as much as you can...
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
            if ($product->getId() == $cartItem->getProduct()->getId()) {

                // we remove cardItem from cart, so we have more product
                // product available += quantity of cardItem
                $product->setAvailableQuantity(
                    $cartItem->getQuantity() + $cartItem->getProduct()->getAvailableQuantity()
                );

                unset($this->items[$key]);
                break;
            }
        }
    }

    /**
     * This returns total number of products added in cart
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
     * Get all items
     * @return array
     */
    function getItems(): array
    {
        return $this->items;
    }
}
