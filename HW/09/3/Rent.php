<?php

interface Payment
{
    public function getPayment(): int;
}

class Rent implements Payment
{
    private static $startId = 1;
    private int $id;
    private Vehicle $vehicle;
    private string $day;
    private int $parkingPlaceID;
    private int $parkingFloor;
    private int $enterHour;
    private ?int $exitHour;
    private bool $inParking = false;

    public function __construct(
        Vehicle $vehicle,
        string $day,
        int $parkingPlaceID,
        int $parkingFloor,
        int $enterHour,
        ?int $exitHour = null,
    ) {
        $this->id = self::$startId++;
        $this->vehicle = $vehicle;
        $this->day = $day;
        $this->parkingPlaceID = $parkingPlaceID;
        $this->parkingFloor = $parkingFloor;
        $this->enterHour = $enterHour;
        $this->exitHour = $exitHour;
        if (!isset($exitHour)) {
            $this->inParking = true;
        }
    }

    public function isParked()
    {
        return $this->inParking;
    }

    public function getInfo(): string
    {
        $rentInfo = "";

        $type = basename(str_replace("\\", "/", get_class($this->vehicle)));
        $weight = $this->vehicle->getWeight();
        $tag = $this->vehicle->getTag();

        $rentInfo .= $type . " ";
        $rentInfo .= $weight ? "that has $weight ton weight, " : "";
        $rentInfo .= $tag ? "with tag $tag, " : "";
        $rentInfo .= "in $this->day ";
        $rentInfo .= "enters in $this->enterHour ";
        $rentInfo .= isset($this->exitHour)
            ? "exits in $this->exitHour "
            : "and not exited yet, not payed yet.";

        return $rentInfo;
    }
    public function getPayment(?bool $message = false): int
    {

        // Show a info about that.
        if ($message)
            echo $this->getInfo() . PHP_EOL;

        if (!isset($this->exitHour)) {
            // return $this->vehicle->getEntrance();
            return 0;
        }

        return
            $this->vehicle->getEntrance() +
            $this->vehicle->getPerHour() *
            ($this->exitHour - $this->enterHour);
    }
}
