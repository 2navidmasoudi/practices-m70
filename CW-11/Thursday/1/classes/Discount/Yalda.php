<?php

namespace Discount;

class Yalda implements Strategy
{
    const JACKET_DISCOUNT = 10 / 100;
    const SOCKS_DISCOUNT  = 20 / 100;
    const SHIRT_DISCOUNT  = 25 / 100;
    const PANTS_DISCOUNT  = 25 / 100;

    public function priceByDiscount(\Clothing\Clothing $clothing): float
    {
        $price = $clothing->getBasePrice();
        $className = get_class($clothing);
        $clothingType = basename(str_replace('\\', '/', $className));
        // discount for cloth type.

        switch ($clothingType) {
            case "Jacket":
                $price *= (1 - self::JACKET_DISCOUNT);
                break;
            case "Socks":
                $price *= (1 - self::SOCKS_DISCOUNT);
                break;
            case "Shirt":
                $price *= (1 - self::SHIRT_DISCOUNT);
                break;
            case "Pants":
                $price *= (1 - self::PANTS_DISCOUNT);
                break;
        }

        return $price;
    }
}
