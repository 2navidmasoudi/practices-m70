<?php

namespace TripMethod;

class VIP implements TripMethod
{
    const RAINY = 2;
    const TRAFIC = 2;
    const BOTH = 3;
    const ENTRANCE = 10;
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
