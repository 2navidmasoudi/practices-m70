<?php

include_once "product.inc.php";

class Pants extends Product
{
    private int $size;

    /**
     * Get size of Pants
     * @return int
     */
    function getSize(): int
    {
        return $this->size;
    }

    /**
     * Set size for Pants
     * @param int $size 
     * @return Pants
     */
    function setSize(int $size): self
    {
        if ($size % 2 == 0 and $size >= 30 and $size <= 60)
            $this->size = $size;
        else
            throw new Exception('Not good size.');
        return $this;
    }
}
