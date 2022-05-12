<?php

// use Connection\Connection;
use Database\MySqlDatabase;

include "vendor/autoload.php";

// $mySql = Connection::getInstance();

// $db = new MySqlDatabase($mySql);

$result2 = MySqlDatabase::do()
    ->table('Students')
    ->insert(["name" => "Masoud", "age" => 50])
    ->exec(); // true

$result3 = MySqlDatabase::do()
    ->table('Students')
    ->update(["age" => 30])
    ->where("name", "Masoud")
    ->exec(); // true

$result = MySqlDatabase::do()
    ->table('Students')
    ->select(['name', 'age'])
    ->where("age", "25", ">")
    ->fetchAll();

print_r($result);
