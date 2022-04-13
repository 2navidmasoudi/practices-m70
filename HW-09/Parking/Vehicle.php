<?php

interface hasWeight {
    public function getWeight(): int;
}

abstract class Vehicle {
    protected int $id;
}

class Car extends Vehicle implements hasWeight
{
    public int $weight = 2;

    public function __construct($id, $weight) {
        $this->id = $id;
        $this->weight = $weight;
    }
    public function getWeight(): int
    {
        return $this->weight;
    }
}