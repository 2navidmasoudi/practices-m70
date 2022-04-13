<?php

class Rent
{
    private static $startId = 1;
    private int $id;
    private Vehicle $vehicle;
    private string $day;
    private int $parkingPlaceID;
    private int $parkingFloor;
    private int $enterHour;
    private ?int $exitHour;
    private bool $inParking;

    public function __construct(
        Vehicle $vehicle,
        string $day,
        int $parkingPlaceID,
        int $parkingFloor,
        int $enterHour,
        ?int $exitHour = null,
        bool $inParking = true,
    ) {
        $this->vehicle = $vehicle;
        $this->day = $day;
        $this->parkingPlaceID = $parkingPlaceID;
        $this->parkingFloor = $parkingFloor;
        $this->enterHour = $enterHour;
        $this->exitHour = $exitHour;
        $this->inParking = $inParking;
        // $this->parkId = $parkId;
        $this->id = self::$startId++;
    }

    public function isParked()
    {
        return $this->inParking;
    }

    public function setInParking($inParking)
    {
        $this->inParking = $inParking;
    }
}
