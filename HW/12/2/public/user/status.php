<?php

include_once "get.php";

session_start();

function status($line)
{
    // get all users from data base
    $users = get_users();

    // add new user with username as key
    // $key = $new_user['username'];
    // $users[$key] = $new_user;

    // hash password

    // setting token for future config
    // $users[$key]['token'] = $token;
    // rewerite db with new user
    $data = json_encode($users, JSON_PRETTY_PRINT);
    file_put_contents("../db/users.json", $data);
}
