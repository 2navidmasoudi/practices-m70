<?php

class Compare
{
    public static function compare(Person $person1, Person $person2)
    {
        $balance1 = $person1->getBalance();
        $balance2 = $person2->getBalance();

        $diff = abs($balance1 - $balance2);

        if ($balance1 > $balance2) {
            echo "Person1 has more $diff money";
        } elseif ($balance1 == $balance2) {
            echo "Same money";
        } else {
            echo "Person2 has more $diff money";
        }
    }
}
