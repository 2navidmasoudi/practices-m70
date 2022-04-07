<?php

class Person
{
    public int $totalIncome, $totalOut;

    public function __construct($income, $out)
    {
        $this->totalIncome = is_array($income) ? array_sum($income) : $income;
        $this->totalOut = is_array($out) ? array_sum($out) : $out;
    }

    public function getBalance()
    {
        return $this->totalIncome - $this->totalOut;
    }
}
