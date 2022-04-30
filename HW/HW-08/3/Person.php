<?php

class Person
{
    protected string $firstName;
    protected string $lastName;
    protected int $age;

    public function __construct(string $firstName, string $lastName, int $age)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->age = $age;
    }
}
