<?php

namespace TripMethod;

trait CalcPrice
{
    public function calcPrice(\TripParam $param): float
    {
        if ($param->isRainy() and $param->isTrafic()) {
            return $this->entrance * $this->both;
        }
        if ($param->isRainy()) {
            return $this->entrance * $this->rainy;
        }
        if ($param->isTrafic()) {
            return $this->entrance * $this->trafic;
        }
        return $this->entrance;
    }
}
