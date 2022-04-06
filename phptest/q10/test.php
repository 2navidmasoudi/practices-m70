<?php

class M
{
    public $n;

    public function __construct($n)
    {
        $this->n = $n;
    }
    public static function getName()
    {
        // return $this->n;
    }
}

new M("ali");
echo M::getName();
