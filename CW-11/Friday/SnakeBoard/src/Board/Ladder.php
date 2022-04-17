<?php

namespace Board;

class Ladder
{
    use MovePlayer;

    public function __construct(int $bottom, int $top)
    {
        $this->start = $bottom;
        $this->end = $top;
    }
}
