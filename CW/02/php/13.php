<?php

/*
13.Write a PHP script to extract the user name from the following email ID.
    Sample String : test@example.com'
    Expected Output : 'test'
*/

$str = "test@example.com";
$username = explode("@", $str)[0];
echo $username;
