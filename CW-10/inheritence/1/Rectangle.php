<?php

class Rectangle extends Shape
{
    // private float $a, $b;

    public function __construct(float $a, float $b)
    {
        // $this->a = $a;
        // $this->b = $b;
        $this->perimeter = 2 * ($a + $b);
        $this->area = $a * $b;
    }
}
