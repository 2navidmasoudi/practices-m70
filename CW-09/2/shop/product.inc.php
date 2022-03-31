<?php

class Product
{
    protected string $name;
    protected int $price;
    protected array $options;

    public function __construct(string $name, int $price, array $options)
    {
        $this->name = $name;
        $this->price = $price;
        $this->options = $options;
    }
    
	/**
	 * 
	 * @return string
	 */
	function getName(): string {
		return $this->name;
	}
	
	/**
	 * 
	 * @param string $name 
	 * @return Product
	 */
	function setName(string $name): self {
		$this->name = $name;
		return $this;
	}
	/**
	 * 
	 * @return int
	 */
	function getPrice(): int {
		return $this->price;
	}
	
	/**
	 * 
	 * @param int $price 
	 * @return Product
	 */
	function setPrice(int $price): self {
		$this->price = $price;
		return $this;
	}
	/**
	 * 
	 * @return array
	 */
	function getOptions(): array {
		return $this->options;
	}
	
	/**
	 * 
	 * @param array $options 
	 * @return Product
	 */
	function setOptions(array $options): self {
		$this->options = $options;
		return $this;
	}
}

class Shirt extends Product
{
    private string $size;

	/**
	 * 
	 * @return string
	 */
	function getSize(): string {
		return $this->size;
	}
	
	/**
	 * 
	 * @param string $size 
	 * @return Shirt
	 */
	function setSize(string $size): self {
        switch ($size) {
            case "xm":
            case "md":
            case "lg":
            case "xlg":
            case "2xlg":
                $this->size = $size;
                break;
            default:
                throw new Exception('Not good size.');
        }
		return $this;
	}
}

class Pants extends Product
{
    private int $size;

    // TODO
	/**
	 * 
	 * @return int
	 */
	function getSize(): int {
		return $this->size;
	}
	
	/**
	 * 
	 * @param int $size 
	 * @return Pants
	 */
	function setSize(int $size): self {
        if ($size % 2 == 0 and $size >= 30 and $size <= 60)
		    $this->size = $size;
        else 
            throw new Exception('Not good size.');
        return $this;
	}
}

// $pant = new Pants('a', 2, ['color' => 'red']);
// $pant->setSize(30);

// $shirt = new Shirt('a', 3, ['color' => 'blue']);
// $shirt->setSize('xm');
// print_r($shirt);