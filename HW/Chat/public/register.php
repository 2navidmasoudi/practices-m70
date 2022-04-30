<?php

include_once "error.php";
include_once "user/get.php";
include_once "user/add.php";

header('Content-Type: application/json');

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    extract($_POST);

    if (!$name or !$username or !$email or !$password) {
        send_error(1);
    }

    if (!preg_match('/[a-zA-Z0-9_]{3,32}/', $username)) {
        send_error(2);
    }

    if (!preg_match('/[a-z\s]{3,32}/', $name)) {
        send_error(3);
    }

    if (!preg_match('/.{4,32}/', $password)) {
        send_error(4);
    }

    $users = get_users();

    if (isset($users[$username])) {
        send_error(408);
    }

    $token = add_user($_POST);

    // response to ajax
    $response['statusCode'] = '201';
    $response['token'] = $token;
    $response['status'] = 'success';
    $response['location'] = '/view/chat/';

    http_response_code(201);
    echo json_encode($response);

    session_unset();
    $_SESSION['name'] = $name;
    $_SESSION['username'] = $username;
    $_SESSION['token'] = $token;
}
