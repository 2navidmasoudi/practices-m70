<?php

interface Status
{
    public function getTag(): string|null;
    public function getWeight(): int|null;
}

abstract class Vehicle implements Status
{
    protected ?string $tag = null;
    protected ?int $weight = null;

    public function getTag(): string|null
    {
        return $this->tag;
    }

    public function getWeight(): int|null
    {
        return $this->weight;
    }

    public function addToParking(
        Parking $parking,
        string $day,
        int $parkingPlaceID,
        int $parkingFloor,
        int $enterHour,
        ?int $exitHour = null,
    ) {
        return $parking->addVehicle(
            $this,
            $day,
            $parkingPlaceID,
            $parkingFloor,
            $enterHour,
            $exitHour,
        );
    }
    abstract function getEntrance(): int;
    abstract function getPerHour(): int;
}
