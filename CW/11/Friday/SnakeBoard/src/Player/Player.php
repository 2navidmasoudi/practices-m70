<?php

namespace Player;

class Player
{
    private string $color;
    private string $name;
    private int $cellNumber = 1;

    private array $dices = [];

    public function __construct(string $name, string $color)
    {
        $this->name = $name;
        $this->color = $color;
    }

    public function tossDice()
    {
        $n = rand(1, 6);
        $this->dices[] = $n;
        return $n;
    }

    public function getDices()
    {
        return $this->dices;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getColor()
    {
        return $this->color;
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
