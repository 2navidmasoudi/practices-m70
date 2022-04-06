<?php

require "Account.php";
require "User.php";

$account = new Account("5022291099394999", 250);
$user = new User("Navid", $account);

$user->info();
