<?php

namespace Board;

class Snake
{
    use MovePlayer;
    
    public function __construct(int $head, int $tail)
    {
        $this->start = $head;
        $this->end = $tail;
    }

}
