<?php

namespace Discount;

class Winter implements Strategy
{
    const SPRING_DISCOUNT = 0  / 100;
    const SUMMER_DISCOUNT = 25 / 100;
    const FALL_DISCOUNT   = 40 / 100;
    const WINTER_DISCOUNT = 50 / 100;

    const JACKET_DISCOUNT = 10 / 100;

    public function priceByDiscount(\Clothing\Clothing $clothing): float
    {
        $price = $clothing->getBasePrice();
        $className = get_class($clothing);
        // echo $className; // Clothing/asdasd/asdasdasd/Jacket
        $clothingType = basename(str_replace('\\', '/', $className));

        // $array = explode("\\", $className);
        // $count = count($array);
        // $clothingType = $array[$count - 1];

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

        // discount for Jacket
        if ($clothingType === "Jacket") {
            $price *= (1 - self::JACKET_DISCOUNT);
        }
        return $price;
    }
}
