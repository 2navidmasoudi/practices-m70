<?php

class User
{
    private string $name;
    private Account $account;

    public function __construct(string $name, Account $account)
    {
        $this->name = $name;
        $this->account = $account;
    }

    public function addBalance(float $balance): self
    {
        $currentBalance = $this->account->getBalance();
        $this->account->setBalance($currentBalance + $balance);
        return $this;
    }

    public function subtractBalance(float $balance): self
    {
        $currentBalance = $this->account->getBalance();
        if ($currentBalance >= $balance) {
            $this->account->setBalance($currentBalance - $balance);
        } else {
            echo "Not enough balance.";
        }
        return $this;
    }

    public function info()
    {
        echo "User Name: {$this->name}\n";
        echo "User account number: {$this->account->getAccountNumber()}\n";
        echo "User balance: {$this->account->getBalance()}\n";
    }

    /**
     * 
     * @return string
     */
    function getName(): string
    {
        return $this->name;
    }
}
