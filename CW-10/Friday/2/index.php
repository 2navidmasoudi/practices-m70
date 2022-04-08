<?php

require "TimeStamp.php";

// $date = new DateTime();

$timestamp = time();
$date = new TimeStamp($timestamp);
$date->setTimeZone("Asia/Tehran");
echo $date->getClock();
