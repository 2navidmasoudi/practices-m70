<?php



class Bike
{
    private $name;
    private bool $needsRepair = false;
    private static $number = 1;
    private int $id;
    public function __construct($name)
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
