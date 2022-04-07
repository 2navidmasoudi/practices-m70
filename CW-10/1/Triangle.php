<?php

class Triangle extends Shape
{
    // private float $a, $b;

    public function __construct(float $a, float $b)
    {
        // $this->a = $a;
        // $this->b = $b;
        $c = sqrt($a ** 2 + $b ** 2);
        $this->perimeter = $a + $b + $c;
        $this->area = $a * $b / 2;
    }
}
