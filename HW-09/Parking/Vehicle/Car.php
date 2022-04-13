<?php

namespace Vehicle;

class Car extends \Vehicle
{
    public function __construct(string $tag, int $weight)
    {
        $this->tag = $tag;
        $this->weight = $weight;
    }
    public function getEntrance(): int
    {
        if ($this->weight < 2) {
            return 5000;
        } elseif ($this->weight < 4) {
            return 10000;
        } elseif ($this->weight > 10) {
            return 20000;
        }
    }
    public function getPerHour(): int
    {
        if ($this->weight < 2) {
            return 1000;
        } elseif ($this->weight < 4) {
            return 2000;
        } elseif ($this->weight > 10) {
            return 5000;
        }
    }
}
