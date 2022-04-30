<?php

class BikeProvider implements Provider
{
    public function provide(): Bike
    {
        return new Bike("bike");
    }

    public function repair(Bike $bike)
    {
        $bike->setNeedsRepair(false);
    }
}
