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

    /**
     * 
     * @param string $name 
     * @return User
     */
    function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }
}
