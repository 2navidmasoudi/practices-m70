<?php

$city = $_GET["city"] ?? "";
$month = $_GET["month"] ?? "";
$year = $_GET["year"] ?? "";
$weather = $_GET["weather"] ?? [];

$weatherUrl = "";

foreach ($weather as  $w) {
    // $weatherUrl .= "&weather[]=$w";
    $weatherUrl .= "&weather%5B%5D=$w";
}

header("Location: index.php?response=1&city=$city&month=$month&year=$year{$weatherUrl}");
