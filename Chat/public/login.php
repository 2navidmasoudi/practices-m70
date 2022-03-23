<?php

include_once "root.php";
include_once "error.php";
include_once "user/get.php";

header('Content-Type: application/json');

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    extract($_POST);

    if (!$username or !$password) {
        send_error(1);
    }

    $users = get_users();

    if (!isset($users[$username])) {
        send_error(404);
    }

    if ($users[$username]['password'] !== hash('sha256', $password)) {
        send_error(403);
    }

    session_unset();

    // response to ajax
    http_response_code('200');
    header("HTTP/1.1 200 OK");
    $response['statusCode'] = '200';
    $response['token'] = $users[$username]['token'];
    $response['status'] = 'success';
    $response['location'] = '/view/chat/';

    echo json_encode($response);

    session_unset();
    $_SESSION['name'] = $users[$username]['name'];
    $_SESSION['username'] = $username;
    $_SESSION['token'] = $users[$username]['token'];
}
