<?php

class Row
{
    private array $values;

    public function __construct(array $values)
    {
        $this->values = $values;
    }

    public function count()
    {
        return count($this->values);
    }

    public function getValues()
    {
        return $this->values;
    }
}
