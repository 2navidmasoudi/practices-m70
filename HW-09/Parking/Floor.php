<?php

class Floor
{
    private int $elevation;
    private string $name;
    private int $capacity;

    private array $parkings = [];

    public function __construct(int $elevation, string $name, int $capacity)
    {
        $this->elevation = $elevation;
        $this->name = $name;
        $this->capacity = $capacity;
    }


    public function addVehicle(int $parkingId)
    {
        $this->parkings[$parkingId] = true;
    }

    public function parkingStatus(int $parkingId): bool
    {
        return $this->parkings[$parkingId] ?? false;
    }

    public function getCapacity(): int
    {
        return $this->capacity;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getElevation(): int
    {
        return $this->elevation;
    }
}
