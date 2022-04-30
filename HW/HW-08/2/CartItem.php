<?php

class CartItem
{
    private Product $product;
    private int $quantity;

    public function __construct(Product $product, int $quantity)
    {
        if ($quantity <= $product->getAvailableQuantity()) {

            // Less available product when we pick it.
            $product->setAvailableQuantity(
                $product->getAvailableQuantity() - $quantity
            );

            $this->product = $product;
            $this->quantity = $quantity;
        } else {
            throw new Exception("Quantity is more than available.");
        }
    }

    public function increaseQuantity()
    {
        if ($this->product->getAvailableQuantity() > 0) {
            $this->quantity++;

            // we pick one, so we have less product now...
            $this->product->setAvailableQuantity(
                $this->product->getAvailableQuantity() - 1
            );
        } else {
            echo "Product is not available, so sorry...";
        }
    }

    public function decreaseQuantity()
    {
        if ($this->quantity > 1) {
            $this->quantity--;

            // we put one, so we have more product now...
            $this->product->setAvailableQuantity(
                $this->product->getAvailableQuantity() + 1
            );
        } else {
            echo "There is only 1 product, Please remove it.";
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
