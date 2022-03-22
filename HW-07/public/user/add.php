<?php

include_once "get.php";

function add_user($new_user)
{
    // get all users from data base
    $users = get_users();

    // add new user with username as key
    $key = $new_user['username'];
    $users[$key] = $new_user;

    // hash password
    $new_pass = hash('sha256', $new_user['password']);
    $users[$key]['password'] = $new_pass;

    // setting token for future config
    $token = hash('md5', $key . $new_pass);
    $users[$key]['token'] = $token;

    // rewerite db with new user
    $data = json_encode($users, JSON_PRETTY_PRINT);
    file_put_contents("../db/users.json", $data);

    return $token;
}
