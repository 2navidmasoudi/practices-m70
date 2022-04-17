<?php

namespace Discount;

use Clothing\Clothing;

class Summer implements Strategy
{
    const SPRING_DISCOUNT = 40 / 100;
    const SUMMER_DISCOUNT = 50 / 100;
    const FALL_DISCOUNT   = 0  / 100;
    const WINTER_DISCOUNT = 30 / 100;

    public function priceByDiscount(Clothing $clothing): float
    {
        $price = $clothing->getBasePrice();
        // $className = get_class($clothing);
        // $clothType = basename(str_replace('\\', '/', $className));
        // discount for cloth season type.
        switch ($clothing->getSeason()) {
            case "spring":
                $price *= (1 - self::SPRING_DISCOUNT);
                break;
            case "summer":
                $price *= (1 - self::SUMMER_DISCOUNT);
                break;
            case "fall":
                $price *= (1 - self::FALL_DISCOUNT);
                break;
            case "winter":
                $price *= (1 - self::WINTER_DISCOUNT);
                break;
        }

        return $price;
    }
}
