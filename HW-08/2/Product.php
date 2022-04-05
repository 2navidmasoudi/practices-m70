<?php


class Product
{
    private int $id;
    private string $title;
    private float $price;
    private int $availableQuantity;

    // TODO Generate constructor with all properties of the class
    function __construct(int $id, string $title, float $price, int $availableQuantity)
    {
        $this->id = $id;
        $this->title = $title;
        $this->price = $price;
        $this->availableQuantity = $availableQuantity;
    }

    /**
     * Add Product $product into cart. If product already exists inside cart
     * it must update quantity.
     * This must create CartItem and return CartItem from method
     * Bonus: $quantity must not become more than whatever
     * is $availableQuantity of the Product
     *
     * @param Cart $cart
     * @param int $quantity
     * @return CartItem
     */
    public function addToCart(Cart $cart, int $quantity): CartItem
    {
        return $cart->addProduct($this, $quantity);
    }

    /**
     * Remove product from cart
     *
     * @param Cart $cart
     */
    public function removeFromCart(Cart $cart)
    {
        $cart->removeProduct($this);
    }
    /**
     * 
     * @return int
     */
    function getId(): int
    {
        return $this->id;
    }

    /**
     * 
     * @param int $id 
     * @return Product
     */
    function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }
    /**
     * 
     * @return string
     */
    function getTitle(): string
    {
        return $this->title;
    }

    /**
     * 
     * @param string $title 
     * @return Product
     */
    function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }
    /**
     * 
     * @return float
     */
    function getPrice(): float
    {
        return $this->price;
    }

    /**
     * 
     * @param float $price 
     * @return Product
     */
    function setPrice(float $price): self
    {
        $this->price = $price;
        return $this;
    }
    /**
     * 
     * @return int
     */
    function getAvailableQuantity(): int
    {
        return $this->availableQuantity;
    }

    /**
     * 
     * @param int $availableQuantity 
     * @return Product
     */
    function setAvailableQuantity(int $availableQuantity): self
    {
        $this->availableQuantity = $availableQuantity;
        return $this;
    }
}
