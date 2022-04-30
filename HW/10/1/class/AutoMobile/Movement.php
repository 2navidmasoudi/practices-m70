<?php

namespace AutoMobile;

interface Movement
{
    public function MoveUp(float $distance = 0): self;
    public function MoveDown(float $distance = 0): self;
    public function MoveRight(float $distance = 0): self;
    public function MoveLeft(float $distance = 0): self;
}
