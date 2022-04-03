<?php

include_once "product.class.php";
class Shirt extends Product
{
    private string $size;

    /**
     * 
     * @return string
     */
    function getSize(): string
    {
        return $this->size;
    }

    /**
     * 
     * @param string $size 
     * @return Shirt
     */
    function setSize(string $size): self
    {
        switch ($size) {
            case "sm":
            case "md":
            case "lg":
            case "xlg":
            case "2xlg":
                $this->size = $size;
                break;
            default:
                echo "not a good size for shirt";
        }
        return $this;
    }
}
