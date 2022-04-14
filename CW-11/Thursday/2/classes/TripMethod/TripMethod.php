<?php

namespace TripMethod;

interface TripMethod
{
    public function calcPrice(\TripParam $param): float;
}
