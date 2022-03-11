<?php

include_once "error.php";
include_once "user/get.php";
include_once "user/add.php";

session_start();

$path_register = "/view/register/index.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    extract($_POST);

    $_SESSION['username'] = $username;
    $_SESSION['email'] = $email;
    $_SESSION['name'] = $name;

    if (!$name or !$username or !$email or !$password) {
        send_error($path_register, 1);
    }

    if (!preg_match('/[a-zA-Z0-9_]{3,32}/', $username)) {
        send_error($path_register, 2);
    }

    if (!preg_match('/[a-z\s]{3,32}/', $name)) {
        send_error($path_register, 3);
    }

    if (!preg_match('/.{4,32}/', $password)) {
        send_error($path_register, 4);
    }

    $users = get_users();

    if (isset($users[$username])) {
        send_error($path_register, 408);
    }

    add_user($_POST);
    session_unset();

    $_SESSION['user'] = [
        "name" => $name,
        "username" => $username,
    ];
    header("location: /view/chat/index.php");
}
