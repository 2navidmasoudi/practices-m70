<?php

class Bike
{
    private static $number = 1;

    private int $id;
    private string $name;
    private bool $needsRepair = false;

    public function __construct(string $name)
    {
        $this->name = $name;
        $this->id = self::$number++;
    }

    public function getNeedsRepair(): bool
    {
        return $this->needsRepair;
    }

    public function setNeedsRepair(bool $needsRepair)
    {
        $this->needsRepair = $needsRepair;
    }
}
