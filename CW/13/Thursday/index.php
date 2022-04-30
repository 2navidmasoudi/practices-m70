<?php

use Connection\Connection;
use Database\MySqlDatabase;

include "vendor/autoload.php";

$mySql = Connection::getInstance();

$query1 = new MySqlDatabase($mySql);
$result = $query1
    ->table('Students')
    ->select(['name', 'age'])
    ->where("age", "18", ">")
    ->fetchAll();

$result2 = $query1
    ->table('Students')
    ->insert(["name" => "Shabpare", "age" => 5])
    ->exec();

$result3 = $query1
    ->table('Students')
    ->update(["age" => "29999"])
    ->where("name", "Ali")
    ->exec();

print_r($result);
