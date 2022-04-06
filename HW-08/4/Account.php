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

    public function addBalance(float $balance): self
    {
        $this->balance += $balance;
        return $this;
    }

    public function subtractBalance(float $balance): self
    {
        if ($this->balance >= $balance) {
            $this->balance -= $balance;
        } else {
            echo "Not enough balance.";
        }
        return $this;
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
    /**
     * 
     * @param float $balance 
     * @return Account
     */
    function setBalance(float $balance): self
    {
        $this->balance = $balance;
        return $this;
    }
}
