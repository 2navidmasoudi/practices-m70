<?php

include_once "product.class.php";

class Pants extends Product
{
    private int $size;

    // TODO
    /**
     * 
     * @return int
     */
    function getSize(): int
    {
        return $this->size;
    }

    /**
     * 
     * @param int $size 
     * @return Pants
     */
    function setSize(int $size): self
    {
        if ($size % 2 == 0 && $size <= 60 && $size >= 30)
            $this->size = $size;
        return $this;
    }
}
