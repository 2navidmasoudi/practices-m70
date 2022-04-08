<?php

include_once "SortingSterategy.php";
class PlainSort implements SortingStrategy
{
    public function getSortedSet($set)
    {
        sort($set);
        return $set;
    }
}
