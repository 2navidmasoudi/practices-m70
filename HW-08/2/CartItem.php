<?php

class CartItem
{
    private Product $product;
    private int $quantity;

    public function __construct(Product $product, int $quantity)
    {
        $this->product = $product;
        $this->quantity = $quantity;
    }

    public function increaseQuantity()
    {
        if ($this->quantity < $this->product->getAvailableQuantity()) {
            $this->quantity++;
        }
    }

    public function decreaseQuantity()
    {
        if ($this->quantity > 1) {
            $this->quantity--;
        }
    }
    /**
     * 
     * @return Product
     */
    function getProduct(): Product
    {
        return $this->product;
    }

    /**
     * 
     * @param Product $product 
     * @return CartItem
     */
    function setProduct(Product $product): self
    {
        $this->product = $product;
        return $this;
    }
    /**
     * 
     * @return int
     */
    function getQuantity(): int
    {
        return $this->quantity;
    }

    /**
     * 
     * @param int $quantity 
     * @return CartItem
     */
    function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;
        return $this;
    }
}
