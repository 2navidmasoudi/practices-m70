<?php

include_once "product.inc.php";

class Shirt extends Product
{
    private string $size;

    /**
     * Get size of Shirt
     * @return string
     */
    function getSize(): string
    {
        return $this->size;
    }

    /**
     * Set size for Shirt
     * @param string $size 
     * @return Shirt
     */
    function setSize(string $size): self
    {
        switch ($size) {
            case "xm":
            case "md":
            case "lg":
            case "xlg":
            case "2xlg":
                $this->size = $size;
                break;
            default:
                throw new Exception('Size not allowed!');
        }
        return $this;
    }
}