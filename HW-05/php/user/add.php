<?php

include $_SERVER["DOCUMENT_ROOT"] . "/php/variable.php";
include "get.php";

function add_user($newUser)
{
    global $root;
    $users = get_users();
    $users = array_merge($users, [$newUser]);
    $data = json_encode($users, JSON_PRETTY_PRINT);
    $result = file_put_contents("$root/database/user.json", $data);
    return $result;
}
