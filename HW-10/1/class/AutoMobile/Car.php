<?php

namespace AutoMobile;

/**
 * NOTE: game will die everytime:
 * - you are out of fuel
 * - you win (reach destination)
 * 
 * Arguments for Cars 🏎️
 * 
 * @param float $fuel
 * @param array $destination
 * Destination for car to reach etc.: [10,10]
 * @param array $position [optional] default = [0,0]
 * Staring position for car etc.: [2,3]
 */
abstract class Car implements Movement
{

    protected float $fuel; # ⛽
    protected array $position; # 🛣️
    protected array $destination; # 🏁

    protected float $speed = 1;
    private float $distance;

    public function __construct($fuel, $destination, $position = [0, 0])
    {
        $this->fuel = $fuel;
        $this->destination = $destination;
        $this->position = $position;

        $this->distance = $this->calcDistance();
    }

    private function calcDistance()
    {
        $dx = $this->position[0] - $this->destination[0];
        $dy = $this->position[1] - $this->destination[1];
        return sqrt($dx ** 2 + $dy ** 2); # 📐
    }

    public function getFuel(): float
    {
        return $this->fuel;
    }

    public function addFuel(float $fuel): self
    {
        $this->fuel += $fuel;
        return $this;
    }

    public function getPosition(): array
    {
        return $this->position;
    }

    public function getDestination(): array
    {
        return $this->destination;
    }

    public function check()
    {
        // Check if the gamer is heading a wrong way!
        $newDistance = $this->calcDistance();
        if ($newDistance > $this->distance) {
            echo "You are heading a wrong way!" . PHP_EOL;
        }
        $this->distance = $newDistance;

        // Check if the gamer has won!
        if ($this->position == $this->destination)
            die("Congratulation, You made it with " . $this->fuel . " fuel left!");
    }

    abstract protected function useFuel(float $distance): void;
}
