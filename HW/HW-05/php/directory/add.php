<?php

include $_SERVER["DOCUMENT_ROOT"] . "/php/variable.php";
include  "$root/php/function.php";

function add_directory($data, $token)
{
    global $root;
    $directory = rand_str(10);
    $data = array_merge($data, [$token => $directory]);
    $json_data = json_encode($data, JSON_PRETTY_PRINT);
    $result = file_put_contents("$root/database/directory.json", $json_data);
    if ($result) {
        _log("directory for $token added to $directory", 'directory');
    }
    return $directory;
}
