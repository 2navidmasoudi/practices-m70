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
    private array $floors;

    // auto generated
    private int $capacity;
    private int $totalFloors;

    // Array of Rent Requests.
    private array $rents = [];

    public function __construct(
        string $name,
        int $openHour,
        int $closeHour,
        array $floors,
    ) {
        $this->name = $name;
        $this->openHour = $openHour;
        $this->closeHour = $closeHour;
        $this->floors = $floors;

        $this->setCapacity($floors);
        $this->setTotalFloors($floors);
    }

    public function setCapacity(array $floors)
    {
        $this->capacity = array_reduce(
            $floors,
            fn ($carry, $floor) => $carry + $floor->getCapacity(),
            0
        );
    }

    public function setTotalFloors(array $floors)
    {
        $this->capacity = count($floors);
    }

    public function addFloor(Floor $floor)
    {
        $this->floors[] = $floor;
        $this->setCapacity($this->floors);
        $this->setTotalFloors($this->floors);
    }

    public function addVehicle(
        Vehicle $vehicle,
        string $day,
        int $parkingPlaceID,
        int|string $parkingFloor,
        int $enterHour,
        ?int $exitHour = null,
    ): Rent|bool {

        $error = [];

        if ($this->info(true)) {
            $error[] = "Parking is full, Comeback later :)";
            return false;
        }

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

        // Car entered before opening hour
        if ($enterHour <= $this->openHour) {
            $error[] =  "Parking is not open yet. (Open Hour = $this->openHour)";
        }
        // Car exited after closing hour
        if (isset($exitHour) and $exitHour > $this->closeHour) {
            $error[] =  "Parking is closed in this time. (Close Hour = $this->closeHour)";
        }

        $rent = new Rent(
            $vehicle,
            $day,
            $parkingPlaceID,
            $parkingFloor,
            $enterHour,
            $exitHour,
        );

        $findFloor = null;
        foreach ($this->floors as $key => $floor) {
            if ($parkingFloor === $floor->getElevation() || $parkingFloor === $floor->getName()) {
                $findFloor = $key;
            }
        }

        if (!isset($findFloor)) {
            $error[] = "Parking floor with (name or elevation) $parkingFloor Not found!";
        }

        // Check if the parking slot is already taken...
        if (
            !isset($exitHour)
            and $this->floors[$findFloor]->parkingStatus($parkingPlaceID - 1)
            // and in_array($rent, $this->rents)
        ) {
            $error[] = "This parking slot id:$parkingPlaceID on (name|elevation):$parkingFloor is already taken";
        }

        if (count($error)) {
            show_errors($error);
            return FALSE;
        }

        // if We dont have exit hour, We take the parking slot.
        if (!isset($exitHour)) {
            $this->floors[$findFloor]->addVehicle($parkingPlaceID - 1);
        }

        $this->rents[] = $rent;
        return $rent;
    }

    public function info(?bool $checkFull = false)
    {
        $start = 1;
        foreach ($this->floors as $floor) {
            for ($i = 0; $i < $floor->getCapacity(); $i++) {
                if ($floor->parkingStatus($i)) {
                    if (!$checkFull)
                        echo $start . "(" . $floor->getName() . $floor->getElevation() . ")-> full\n";
                } else {
                    if (!$checkFull)
                        echo $start . "(" . $floor->getName() . $floor->getElevation() . ")-> empty\n";
                    else
                        return false;
                }
                $start++;
            }
        }
        if ($checkFull) return true;
    }

    public function getPayment()
    {
        return array_reduce(
            $this->rents,
            fn ($carry, $rent) => $rent->getPayment(false) + $carry,
            0
        );
    }
}
