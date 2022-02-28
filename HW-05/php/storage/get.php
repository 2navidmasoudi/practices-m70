<?php

include $_SERVER["DOCUMENT_ROOT"] . "/php/variable.php";
include "create.php";
include "add.php";
include "info.php";

function get_storage($directory)
{
    create_storage();
    add_storage($directory);
    $storage = storage_info($directory);
    return $storage;
}
