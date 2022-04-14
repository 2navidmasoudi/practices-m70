<?php

namespace TripMethod;

class Bike implements TripMethod
{
    const RAINY = 0.8;
    const TRAFIC = 2;
    const BOTH = 1.5;
    const ENTRANCE = 4;
    public function calcPrice(\TripParam $param): float
    {
        if ($param->isRainy() and $param->isTrafic()) {
            return self::ENTRANCE * self::BOTH;
        }
        if ($param->isRainy()) {
            return self::ENTRANCE * self::RAINY;
        }
        if ($param->isTrafic()) {
            return self::ENTRANCE * self::TRAFIC;
        }
        return self::ENTRANCE;
    }
}
