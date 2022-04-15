<?php

namespace Board;

class Ladder
{
    public function __construct(int $bottom, int $top)
    {
        $this->start = $bottom;
        $this->end = $top;
    }

    use MovePlayer;
}
