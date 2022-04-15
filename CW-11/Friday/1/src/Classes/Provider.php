<?php

interface Provider
{
    public function provide(): Bike;
    public function repair(Bike $bike);
}
