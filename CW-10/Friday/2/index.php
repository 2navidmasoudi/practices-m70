<?php

require "Change.php";
require "Time.php";
require "Log.php";

$timestamp = time();
$date = new Time($timestamp);
$date->setTimeZone("Asia/Tehran")
    ->addDay(1)
    ->get()
    ->addMonth(3)
    ->getDate()
    ->addYear(3)
    ->getTime();

Log::output();
