<?php

interface AnimalRoutine
{
    public function MakeNoise(): string;
    public function eat(): string;
}

abstract class Animal implements AnimalRoutine
{
    protected $name;
    public function __construct(string $name)
    {
        $this->name = $name;
    }
    public function eat(): string
    {
        return $this->name . " is eating";
    }
}

class Cat extends Animal
{
    public function MakeNoise(): string
    {
        return "meow meow";
    }
}

class Dog extends Animal
{
    public function MakeNoise(): string
    {
        return "bark bark";
    }
}

$dog = new Dog('Husky');
echo $dog->eat();
// echo $dog->MakeNoise();
