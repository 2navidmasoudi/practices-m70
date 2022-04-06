<?php

require "Account.php";
require "User.php";

$account = new Account("5022291099394999", 250);
$user = new User("Navid", $account);

$account->addBalance(500)->subtractBalance(300);
$user->addBalance(300)->subtractBalance(400);

$user->info();
