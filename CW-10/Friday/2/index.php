<?php

require "Time.php";

// $date = new DateTime();

$timestamp = time();
$date = new Time($timestamp);
$date->setTimeZone("Asia/Tehran");
echo $date->getClock();
