<?php

namespace Board;

trait MovePlayer
{
    private int $start;
    private int $end;
    public function movePlayer(\Player\Player $player)
    {
        $type = basename(str_replace("\\", "/", get_class($this)));
        echo $player->getName() . " reach a " . $type . " from " . $this->start . " to " . $this->end . "!\n";
        $player->move($this->end);
    }

    public function getStart()
    {
        return $this->start;
    }
}
