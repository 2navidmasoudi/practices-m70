<?php

include $_SERVER["DOCUMENT_ROOT"] . "/php/variable.php";
include "create.php";

function get_users()
{
    global $root;
    create_user();
    $data = file_get_contents("$root/database/user.json");
    $users = json_decode($data, true) ?? [];
    return $users;
}
