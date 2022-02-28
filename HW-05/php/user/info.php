<?php

include $_SERVER["DOCUMENT_ROOT"] . "/php/variable.php";
include "$root/php/log.php";
include "get.php";

function user_info($token)
{
    $users = get_users();
    $find = array_search($token, array_column($users, 'token'));
    if ($find === false) {
        _log("$token not found in database", 'user');
        header("Location: /");
        return;
        exit;
    }
    $user = [
        'name' => $users[$find]['username'],
        'token' => $users[$find]['token'],
    ];
    return $user;
}
