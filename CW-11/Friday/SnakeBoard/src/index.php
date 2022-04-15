<?php

use Board\Board;
use Board\Ladder;
use Board\Snake;
use Player\Player;

include "../vendor/autoload.php";

$board = new Board(10, 10);

$board->addPlayer(new Player("Hossein", "green"));
$board->addPlayer(new Player("Navid", "blue"));
$board->addPlayer(new Player("Mohammad", "red"));

$board
    ->addLadder(new Ladder(25, 36))
    ->addLadder(new Ladder(10, 50))
    ->addLadder(new Ladder(5, 60))
    ->addLadder(new Ladder(2, 13))
    ->addSnake(new Snake(70, 45))
    ->addSnake(new Snake(99, 15))
    ->addSnake(new Snake(98, 88))
    ->addSnake(new Snake(54, 30));

$board->getWinner();
