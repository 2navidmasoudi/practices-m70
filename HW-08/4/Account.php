<?php

class Account
{
    private string $accountNumber;
    private float $balance;

    public function __construct(string $accountNumber, $balance = 0)
    {
        if ($balance >= 0) {
            $this->accountNumber = $accountNumber;
            $this->balance = $balance;
        } else {
            echo "Balance should be positive";
        }
    }

    public function addBalance(float $balance)
    {
        $this->balance += $balance;
    }

    public function substactBalance(float $balance)
    {
        if ($this->balance >= $balance) {
            $this->balance -= $balance;
        } else {
            echo "Not enough balance.";
        }
    }
    /**
     * 
     * @return string
     */
    function getAccountNumber(): string
    {
        return $this->accountNumber;
    }
    /**
     * 
     * @return float
     */
    function getBalance(): float
    {
        return $this->balance;
    }
}
