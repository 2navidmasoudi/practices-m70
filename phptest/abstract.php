<?php

// interface Animal
// {
//     public function makeSound();
// }


abstract class Animal
{
    public $name;
    public function FunctionName()
    {
        # code...
    }
    abstract public function makeSound();
}

class Lion extends Animal
{
    public function makeSound()
    {
        echo "ror";
    }
}

class Cat extends Lion
{
}

$cat = new Cat;

$cat->makeSound();
