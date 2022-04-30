<?php

class MathOperation
{
    private array $args = [];

    // Get numbers and set it to object
    function __construct(int ...$args)
    {
        $this->args = $args;
    }

    // Prevent from adding any property to class.
    public function __set($name, $value)
    {
        throw new Exception("Cannot add new property \$$name to instance of " . __CLASS__);
    }

    public function sum(): int
    {
        return array_reduce(
            $this->args,
            fn ($carry, $n) => $carry + $n,
            0
        );
    }

    public function product(): int
    {
        return array_reduce(
            $this->args,
            fn ($carry, $n) => $carry * $n,
            1
        );
    }
}
