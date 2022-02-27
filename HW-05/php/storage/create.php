<?php

include $_SERVER["DOCUMENT_ROOT"] . "/php/variable.php";
include_once "$root/php/log.php";

function create_storage($directory = null)
{
    global $root;
    if (!file_exists("$root/storage")) {
        _log("storage folder created", 'storage');
        mkdir("$root/storage");
    }
}
