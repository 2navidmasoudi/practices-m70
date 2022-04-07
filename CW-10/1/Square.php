<?php

class Square extends Shape
{
    // private float $a;

    public function __construct(float $a)
    {
        // $this->a = $a;
        $this->perimeter = 4 * ($a);
        $this->area = $a * $a;
    }
}
