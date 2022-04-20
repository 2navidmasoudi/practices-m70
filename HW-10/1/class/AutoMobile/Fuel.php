<?php

namespace AutoMobile;

// ⛽
trait Fuel
{
    protected function useFuel(float $distance): void
    {
        $used = $distance * $this->fuelConsumption;
        if (method_exists(__CLASS__, "setSpeed") and $this->speed > 1) {
            // Speed has effect on distance, we don't put it here...
            $used *= $this->increaseRatio;
        }

        // NO GAMER 😢 WHY???
        if ($used > $this->fuel)
            die("Game Over, You are out of fuel!");

        $this->fuel -= $used;
    }
}
