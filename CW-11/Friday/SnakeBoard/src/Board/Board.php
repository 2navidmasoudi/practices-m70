<?php

namespace Board;

use LucidFrame\Console\ConsoleTable;
use Player\Colors;
use Player\Player;

class Board
{
    private int $cells;
    private array $snakes = [];
    private array $ladders = [];
    private array $players = [];

    private ConsoleTable $statusTable;

    public function __construct(int $width, $height)
    {
        $this->cells = $width * $height;

        $this->statusTable = new ConsoleTable;
        $this->statusTable
            ->setHeaders([Colors::putColor(), "Game Status 🎮"])
            ->hideBorder();
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
        return $this;
    }

    public function getWinner(float $speed = 0.5)
    {
        while (true) {

            // for clearning terminal
            if (PHP_OS == "Windows") {
                system("cls");
            } else {
                system("clear");
            }

            $this->statusTable->display();

            $this->MovePlayers();
            $this->checkPlayers();
            usleep($speed * 1000000);
        }
    }

    public function MovePlayers()
    {
        // Show each players dice
        $diceTable = new ConsoleTable;

        // Show players scores.
        $scoreTable = new ConsoleTable;
        $scoreTable->setHeaders(
            [
                Colors::putColor(),
                "Player",
                // "Dice",
                "🏠"
            ]
        );

        foreach ($this->players as $player) {

            // random number for player :)
            $n = $player->tossDice();
            $diceTable->addRow(
                [
                    Colors::putColor($player->getColor()),
                    $player->getName(),
                    implode(",", $player->getDices())
                ]
            );

            // echo Colors::putColor($player->getColor());
            // echo $player->getName() . ": ";
            // echo implode(",", $player->getDices());
            // echo "\n";
            // if out of reach.
            if ($player->getCellNumber() + $n <= $this->cells)
                $player->move($player->getCellNumber() + $n);

            // Describe each player in which cell;
            $scoreTable->addRow(
                [
                    Colors::putColor($player->getColor()),
                    $player->getName(),
                    // $n,
                    $player->getCellNumber(),
                ]
            );
            // echo Colors::putColor($player->getColor());
            // echo $player->getName();
            // echo ": got $n and now on " . $player->getCellNumber();
            // echo "\n";
            // usleep($speed * 1000000);
            // Check if player reach any Snake or ladder here.

        }
        echo Colors::putColor();
        echo "---------- Player 🎲 ----------\n";
        $diceTable->hideBorder()->display();
        $scoreTable->hideBorder()->display();
    }

    public function checkPlayers()
    {
        // Check winner
        foreach ($this->players as $player) {
            // if Player reach end, game will end
            if ($player->getCellNumber() == $this->cells) {
                echo Colors::putColor($player->getColor());
                $winner_message = "Game Over, Player: " . $player->getName() . " won!";
                $table = new ConsoleTable;
                $table
                    ->addRow()
                    ->addColumn($winner_message)
                    ->display();
                exit;
            }
            // snake
            foreach ($this->snakes as $snake) {
                if ($player->getCellNumber() == $snake->getStart()) {
                    $this->statusTable
                        ->addRow($snake->movePlayer($player));
                }
            }
            // ladder
            foreach ($this->ladders as $ladder) {
                if ($player->getCellNumber() == $ladder->getStart()) {
                    $this->statusTable
                        ->addRow($ladder->movePlayer($player));
                }
            }
        }
    }
}
