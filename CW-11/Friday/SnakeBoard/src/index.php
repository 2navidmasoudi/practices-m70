<?php

use Board\Board;
use Board\Ladder;
use Board\Snake;
use Player\Player;

include "../vendor/autoload.php";

$board = new Board(10, 10);

$player1 = $board->addPlayer(new Player("Navid", "blue"));
$player1 = $board->addPlayer(new Player("Rasoul", "green"));
$player1 = $board->addPlayer(new Player("Amin", "red"));

$board->addLadder(new Ladder(10, 50));
$board->addSnake(new Snake(54, 30));

$board->getWinner();
