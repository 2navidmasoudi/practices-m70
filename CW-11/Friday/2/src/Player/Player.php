<?php

namespace Player;

class Player
{
    private string $color;
    private string $name;
    private int $cellNumber = 1;

    public function __construct(string $name, string $color)
    {
        $this->name = $name;
        $this->color = $color;
    }

    public function getName()
    {
        return $this->name;
    }

    public function move(int $cellNumber)
    {
        $this->cellNumber = $cellNumber;
    }

    public function getCellNumber()
    {
        return $this->cellNumber;
    }
}
