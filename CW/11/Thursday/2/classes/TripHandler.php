<?php

use TripMethod\{Bike, VIP, Economic};

class TripHandler
{

    const X = [
        [1, 2, 2, 4, 3],
        [2, 1, 4, 2, 3],
        [3, 5, 1, 3, 2],
        [4, 3, 3, 1, 2],
        [3, 3, 2, 2, 1],
    ];

    private static $instance = null;

    private function __construct()
    {
    }

    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new TripHandler();
        }

        return self::$instance;
    }


    public function calcPrice(
        string $type,
        TripParam $params,
    ): ?float {

        $x = self::X[$params->getStart()][$params->getEnd()];
        if ($type == "vip") {
            return (new VIP)->calcPrice($params) * $x;
        }
        if ($type == "bike") {
            return (new Bike)->calcPrice($params) * $x;
        }
        if ($type == "economic") {
            return (new Economic)->calcPrice($params) * $x;
        }
        echo "Please select from vip|economic|bike";
        return null;
    }
}
