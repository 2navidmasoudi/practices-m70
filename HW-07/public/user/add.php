<?php

include_once "get.php";

function add_user($new_user)
{
    $users = get_users();
    $users[$new_user['username']] = $new_user;
    $users[$new_user['username']]['password'] = hash('sha256', $new_user['password']);

    $data = json_encode($users, JSON_PRETTY_PRINT);
    file_put_contents("../db/users.json", $data);
}
