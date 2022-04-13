<?php

namespace Vehicle;

class Bike extends \Vehicle
{
    public function getEntrance(): int
    {
        return 1000;
    }
    public function getPerHour(): int
    {
        return 250;
    }
}
