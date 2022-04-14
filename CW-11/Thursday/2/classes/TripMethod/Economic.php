<?php

namespace TripMethod;

class Economic implements TripMethod
{
    const RAINY = 1.2;
    const TRAFIC = 1.2;
    const BOTH = 1.4;
    const ENTRANCE = 5;
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
