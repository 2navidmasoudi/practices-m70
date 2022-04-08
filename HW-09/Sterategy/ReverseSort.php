<?php

include_once "SortingSterategy.php";

class ReverseSort implements SortingStrategy
{
    public function getSortedSet($set)
    {
        rsort($set);
        return $set;
    }
}
