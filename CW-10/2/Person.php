<?php

class Person
{
    public int $totalIncome, $totalOut;

    public function __construct($income, $out)
    {
        if (is_array($income) && is_array($out)) {
            $this->totalIncome = array_sum($income);
            $this->totalOut = array_sum($out);
        } elseif (is_int($income) and is_int($out)) {
            $this->totalIncome = $income;
            $this->totalOut = $out;
        } else {
            echo "error";
        }
    }

    public function getBalance()
    {
        return $this->totalIncome - $this->totalOut;
    }
}
