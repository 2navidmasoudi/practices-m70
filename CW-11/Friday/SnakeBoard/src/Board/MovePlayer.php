<?php

namespace Board;

use Player\Colors;
use Player\Player;

trait MovePlayer
{
    private int $start;
    private int $end;
    public function movePlayer(Player $player)
    {
        $type = basename(str_replace("\\", "/", get_class($this)));
        if ($type == "Snake") {
            $type = "🐍";
        } elseif ($type == "Ladder") {
            $type = "🪜";
        }
        $player->move($this->end);
        return [
            Colors::putColor($player->getColor()),
            $player->getName(),
            $type,
            $this->start,
            "▶",
            $this->end
        ];
    }

    public function getStart()
    {
        return $this->start;
    }
}
