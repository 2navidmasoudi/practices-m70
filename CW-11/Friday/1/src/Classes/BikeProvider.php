<?php

class BikeProvider implements Provider
{
    public function provide(): Bike
    {
        return new Bike("Bike");
    }

    public function repair(Bike $bike)
    {
        $bike->setNeedsRepair(false);
    }
}
