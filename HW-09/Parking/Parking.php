<?php

class Parking {
    private int $capacity = 560;
    private array $parkings = [];
    private array $rents = [];

    public function addVehicle(Vehicle $vehicle): Rent
    {
        if(count($this->parkings) > $this->capacity) {
            throw new Exception("FULL");
        } else {
            $this->parkings[] = $vehicle;

            $rent = new Rent($vehicle);
            $this->rents[] = $rent;
            return $rent;
        }
    }

    public function info(): void
    {
        for ($i=0; $i < $this->capacity; $i++) { 
            if(isset($this->parkings[$i])) {
                echo $i + 1 . "-> full".PHP_EOL;
            } else {
                echo $i + 1 . "-> empty".PHP_EOL;
            }
        }
    }
}