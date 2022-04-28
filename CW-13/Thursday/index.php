<?php

use Connection\Connection;
use Database\MySqlDatabase;

include "vendor/autoload.php";

$mySql = Connection::getInstance();

$query1 = new MySqlDatabase($mySql);
$query1
    ->table('Users')
    ->select(['name', 'age'])
    ->where("age", "18", ">")
    ->fetchAll();

echo "salam";
