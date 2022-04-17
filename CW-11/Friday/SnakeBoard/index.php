<?php

use Board\Board;
use Board\Ladder;
use Board\Snake;
use Player\Player;

include "vendor/autoload.php";

$game = new Board(10, 10);

$game
    ->addPlayer(new Player("Navid", "blue"))
    ->addPlayer(new Player("Hossein", "purple"))
    ->addPlayer(new Player("Amir", "green"))
    ->addPlayer(new Player("Hassan", "red"))
    ->addPlayer(new Player("MohammadReza", "cyan"));

$game
    ->addLadder(new Ladder(25, 36))
    ->addLadder(new Ladder(10, 50))
    ->addLadder(new Ladder(5, 60))
    ->addLadder(new Ladder(2, 18))
    ->addLadder(new Ladder(7, 20))
    ->addLadder(new Ladder(15, 76))
    ->addLadder(new Ladder(3, 8))

    ->addSnake(new Snake(70, 50))
    ->addSnake(new Snake(45, 30))
    ->addSnake(new Snake(99, 1))
    ->addSnake(new Snake(2, 1))
    ->addSnake(new Snake(61, 27))
    ->addSnake(new Snake(98, 88))
    ->addSnake(new Snake(54, 30));

$game->getWinner(0);
