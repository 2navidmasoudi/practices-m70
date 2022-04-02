<?php

class Row
{
    private array $values;

    public function __construct(array $values)
    {
        $this->values = $values;
    }

    /**
     * Returs length of Row
     * @return int
     */
    public function count()
    {
        return count($this->values);
    }

    /**
     * Get $values of Row
     * @return array
     */
    public function getValues()
    {
        return $this->values;
    }
}
