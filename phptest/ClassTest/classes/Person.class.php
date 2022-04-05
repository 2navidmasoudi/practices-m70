<?php

namespace Adam\Navid\M70;

class Person
{
    public string $name;
    function __construct($name)
    {
        $this->name = $name;
        echo "Salam $name";
    }
}
