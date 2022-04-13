<?php

function show_errors(array $error)
{
    foreach ($error as $message) {
        echo $message . PHP_EOL;
    }
}

class Parking
{

    private string $name;
    private int $openHour;
    private int $closeHour;
    private int $capacity;
    private int $floor;
    private int $floorCapacity;

    private array $parkings = [];
    private array $rents = [];

    public function __construct(
        string $name,
        int $openHour,
        int $closeHour,
        int $capacity,
        int $floors,
        int $floorCapacity
    ) {
        $this->name = $name;
        $this->openHour = $openHour;
        $this->closeHour = $closeHour;
        $this->capacity = $capacity;
        $this->floors = $floors;
        $this->floorCapacity = $floorCapacity;
    }

    public function addVehicle(
        Vehicle $vehicle,
        string $day,
        int $parkingPlaceID,
        int $parkingFloor,
        int $enterHour,
        ?int $exitHour = null,
        bool $isParked = true,
    ): Rent|bool {
        $error = [];
        // Enter hour between 0 and 24
        if (!($enterHour >= 0 and $enterHour <= 24)) {
            $error[] = "Invalid entry: enter hour should be between 0 and 24";
        }
        // If We have Exit hour It must be between 0 and 24
        if (isset($exitHour) and !($exitHour >= 0 and $exitHour <= 24)) {
            $error[] = "Invalid entry: exit hour should be between 0 and 24";
        }
        if (count($error)) {
            show_errors($error);
            return false;
        }
        // Car is not in parking anymore Without exit hour
        if (!$isParked and !isset($exitHour)) {
            $error[] =  "Vehicle has left the parking, When is exit hour?";
        }
        // Car is parked now We must not have exit hour
        if ($isParked and isset($exitHour)) {
            $error[] =  "Vehicle Exited, Did you mean vehicle is not in parking anymore?";
        }
        // Car entered before opening hour
        if ($enterHour < $this->openHour) {
            $error[] =  "Parking is not open yet. (Open Hour = $this->openHour)";
        }
        // Car exited after closing hour
        if (isset($exitHour) and $exitHour > $this->closeHour) {
            $error[] =  "Parking is closed in this time. (Close Hour = $this->closeHour)";
        }

        // Check if the parking slot is already taken...
        $index =
            ($parkingFloor - 1) * $this->floorCapacity +
            ($parkingPlaceID - 1);
        if ($isParked and isset($this->parkings[$index]) and $this->parkings[$index]) {
            $error[] = "This parking slot (with id " . ($index + 1) . ") is already taken";
        }

        if (count($error)) {
            show_errors($error);
            return false;
        }

        $rent = new Rent(
            $vehicle,
            $day,
            $parkingPlaceID,
            $parkingFloor,
            $enterHour,
            $exitHour,
            $isParked,
        );

        if ($isParked) {
            $this->parkings[$index] = true;
        }


        $this->rents[] = $rent;
        return $rent;
    }

    public function info(): void
    {
        for ($i = 0; $i < $this->capacity; $i++) {
            if (isset($this->parkings[$i]) and $this->parkings[$i]) {
                echo $i + 1 . "-> full" . PHP_EOL;
            } else {
                echo $i + 1 . "-> empty" . PHP_EOL;
            }
        }
    }
}
