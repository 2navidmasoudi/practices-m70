<?php

include $_SERVER["DOCUMENT_ROOT"] . "/php/variable.php";
include_once "$root/php/log.php";

function add_storage($directory, $path = null)
{
    global $root;
    if (!file_exists("$root/storage/$directory{$path}")) {
        _log("storage $directory{$path} created", 'storage');
        mkdir("$root/storage/$directory{$path}");
    }
}
