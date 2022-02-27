<?php

include $_SERVER["DOCUMENT_ROOT"] . "/php/variable.php";
include "create.php";
include "add.php";

function get_storage($directory)
{
    global $root;
    create_storage();
    add_storage($directory);
    $storage = array_diff(scandir("$root/storage/$directory"), array('..', '.'));
    return $storage;
}
