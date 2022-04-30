<?php

include $_SERVER["DOCUMENT_ROOT"] . "/php/variable.php";

function create_user()
{
    global $root;
    if (!file_exists("$root/database/user.json")) {
        _log('user database created', 'user');
        file_put_contents("$root/database/user.json", "");
    }
}
