<?php

namespace TripMethod;

class Economic implements TripMethod
{
    private float $rainy = 1.2;
    private float $trafic = 1.2;
    private float $both = 1.4;
    private float $entrance = 5;
    use CalcPrice;
}
