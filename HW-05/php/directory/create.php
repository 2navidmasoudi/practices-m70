<?php

include $_SERVER["DOCUMENT_ROOT"] . "/php/variable.php";
include_once "$root/php/log.php";

function create_directory()
{
    global $root;
    if (!file_exists("$root/database/directory.json")) {
        _log('directory database created', 'directory');
        file_put_contents("$root/database/directory.json", "");
    }
}
