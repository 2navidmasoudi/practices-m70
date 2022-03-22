<?php

include_once "get.php";

function add_user($new_user)
{
    // test for ajax result
    echo json_encode($new_user);
    exit;

    // get all users from data base
    $users = get_users();

    // add new user with username key
    $users[$new_user['username']] = $new_user;

    // hash password
    $users[$new_user['username']]['password'] = hash('sha256', $new_user['password']);

    // setting token for future config
    $token = md5($new_user['username'] . $users[$new_user['username']]['password']);
    $users[$new_user['token']]['token'] = $token;

    // rewerite db with new user
    $data = json_encode($users, JSON_PRETTY_PRINT);
    file_put_contents("../db/users.json", $data);

    return $token;
}
