<?php

namespace TripMethod;

class Bike implements TripMethod
{
    private float $rainy = 0.8;
    private float $trafic = 2;
    private float $both = 1.5;
    private float $entrance = 4;
    use CalcPrice;
}
