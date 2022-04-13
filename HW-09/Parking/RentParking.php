<?php

Class Rent {
    private Vehicle $vehicle;
    private static $startId = 1;
    private int $id = 1;

    private int $enterHour = 17;
    private int $exitHour = 19;

    public function __construct(Vehicle $vehicle) {
        $this->vehicle = $vehicle;
        $this->id = self::$startId++;
    }
}