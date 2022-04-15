<?php

namespace Board;

class Snake
{
    public function __construct(int $head, int $tail)
    {
        $this->start = $head;
        $this->end = $tail;
    }

    use MovePlayer;
}
