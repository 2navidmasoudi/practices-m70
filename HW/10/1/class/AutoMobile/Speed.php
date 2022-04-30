<?php

namespace AutoMobile;

use Exception;

trait Speed
{
    public function setSpeed($speed): self
    {
        if ($speed < 1)
            throw new Exception("Speed must be more than 1");

        $this->speed = $speed;
        return $this;
    }
}
