<?php

use Board\Board;
use Board\Ladder;
use Board\Snake;
use Player\Player;

include "../vendor/autoload.php";

$board = new Board(10, 10);

$player1 = $board->addPlayer("Navid", "blue");
$player2 = $board->addPlayer("Rasoul", "green");
$player3 = $board->addPlayer("Amin", "red");

$board->addLadder(new Ladder(10, 50));
$board->addSnake(new Snake(54, 30));

$board->getWinner();
