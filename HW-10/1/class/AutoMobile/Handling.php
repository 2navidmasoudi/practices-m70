<?php

namespace AutoMobile;

// ☸️
trait Handling
{
    public function MoveUp($distance = 1): self
    {
        $distance *= $this->speed;
        $this->position[1] += $distance;
        $this->useFuel($distance);
        $this->check();
        return $this;
    }
    public function MoveDown($distance = 1): self
    {
        $distance *= $this->speed;
        $this->position[1] -= $distance;
        $this->useFuel($distance);
        $this->check();
        return $this;
    }
    public function MoveRight($distance = 1): self
    {
        $distance *= $this->speed;
        $this->position[0] += $distance;
        $this->useFuel($distance);
        $this->check();
        return $this;
    }
    public function MoveLeft($distance = 1): self
    {
        $distance *= $this->speed;
        $this->position[0] -= $distance;
        $this->useFuel($distance);
        $this->check();
        return $this;
    }
}
