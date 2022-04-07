<?php

class Shape
{
    protected float $area, $perimeter;

    public function getPerimeter(): float
    {
        return $this->perimeter;
    }

    public function getArea(): float
    {
        return $this->area;
    }
}
