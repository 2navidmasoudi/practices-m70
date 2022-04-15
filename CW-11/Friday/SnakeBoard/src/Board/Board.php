<?php

namespace Board;

use Player\Player;

class Board
{
    private int $cells;
    private array $snakes = [];
    private array $ladders = [];
    private array $players = [];

    public function __construct(int $width, $height)
    {
        $this->cells = $width * $height;
    }

    public function addSnake(Snake $snake)
    {
        $this->snakes[] = $snake;
        return $this;
    }

    public function addLadder(Ladder $ladder)
    {
        $this->ladders[] = $ladder;
        return $this;
    }

    public function addPlayer(Player $player)
    {
        $this->players[] = $player;
    }

    public function getWinner()
    {
        while (true) {
            foreach ($this->players as $player) {

                // random number for player :)
                $n = rand(1, 6);

                // if out of reach.
                if ($player->getCellNumber() + $n <= $this->cells)
                    $player->move($player->getCellNumber() + $n);

                // Describe each player in which cell;
                if ($player->getColor() == "red") {
                    echo "\e[31m";
                }
                if ($player->getColor() == "blue") {
                    echo "\e[34m";
                }
                if ($player->getColor() == "green") {
                    echo "\e[32m";
                }
                echo $player->getName();
                echo ": got $n and now on " . $player->getCellNumber();
                echo "\n";

                usleep(500000);
                // if Player reach end, game will end.
                if ($player->getCellNumber() == $this->cells) {
                    die("Game Over, Player: " . $player->getName() . " won!");
                }

                // Check if player reach any Snake or ladder here.
                $this->checkCell($player);
            }
        }
    }

    public function checkCell($player)
    {
        // snake
        foreach ($this->snakes as $snake) {
            if ($player->getCellNumber() == $snake->getStart()) {
                $snake->movePlayer($player);
                return;
            }
        }
        // ladder
        foreach ($this->ladders as $ladder) {
            if ($player->getCellNumber() == $ladder->getStart()) {
                $ladder->movePlayer($player);
                return;
            }
        }
    }
}
