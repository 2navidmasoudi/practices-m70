<?php

include $_SERVER["DOCUMENT_ROOT"] . "/php/variable.php";
include "create.php";
include "add.php";

function get_directory($token)
{
    global $root;
    create_directory();
    $file = file_get_contents("$root/database/directory.json");
    $data = json_decode($file, true) ?? [];
    return $data[$token] ?? add_directory($data, $token);
}
