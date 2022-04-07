<?php

require "Reader.php";
require "JSONReader.php";
require "CSVReader.php";
require "VisualData.php";

$json = new JSONReader;
$json->read("people.json");

$visualJSON = new VisualData($json);
$visualJSON->capitalize(1);
$visualJSON->add((object) [
    "id" => 4,
    "name" => "navid",
    "phone" => "09106255595"
]);
$visualJSON->remove(2);
// print_r($visualJSON);
echo $visualJSON->exportToTable();

$csv = new CSVReader;
$csv->read("sample.csv");

$visualCSV = new VisualData($csv);
echo $visualCSV->exportToTable();
