<?php

namespace TripMethod;

class VIP implements TripMethod
{
    private float $rainy = 2;
    private float $trafic = 2;
    private float $both = 3;
    private float $entrance = 10;
    use CalcPrice;
}
