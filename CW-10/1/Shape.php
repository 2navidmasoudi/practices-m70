<?php

class Shape
{
    protected float $area, $perimeter;

    // public function __construct(float $perimeter, float $area)
    // {
    //     $this->perimeter = $perimeter;
    //     $this->area = $area;
    // }
    public function getPerimeter(): float
    {
        return $this->perimeter;
    }

    public function getArea(): float
    {
        return $this->area;
    }
}
