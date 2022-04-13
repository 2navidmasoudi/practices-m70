<?php

namespace Vehicle;

class Motor extends \Vehicle
{
    public function __construct(string $tag)
    {
        $this->tag = $tag;
    }
    public function getEntrance(): int
    {
        return 2500;
    }
    public function getPerHour(): int
    {
        return 500;
    }
}
