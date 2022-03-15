<?php

include_once "error.php";
include_once "user/get.php";

session_start();

$path_login = "/view/login/index.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    extract($_POST);

    $_SESSION['username'] = $username;


    if (!$username or !$password) {
        send_error($path_login, 1);
    }

    $users = get_users();

    if (!isset($users[$username])) {
        send_error($path_login, 404);
    }

    if ($users[$username]['password'] !== hash('sha256', $password)) {
        send_error($path_login, 403);
    }

    session_unset();

    $_SESSION['user'] = [
        "name" => $users[$username]['name'],
        "username" => $username,
    ];

    header("location: /view/chat/index.php");
}
