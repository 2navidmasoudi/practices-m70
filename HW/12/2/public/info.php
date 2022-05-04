<?php

include_once "user/get.php";
include_once "error.php";
include_once "database.php";

session_start();

header('Content-Type: application/json');

// extract($_SESSION);

$token = $_GET['token'] ?? $_SESSION['token'];

if (!isset($token)) {
    session_destroy();
    send_error(400);
}

if (db_mode()) {
    $query = "SELECT * FROM Users WHERE :token = Users.token";
    $stmt = $pdo->prepare($query);
    $stmt->execute(["token" => $token]);
    $response = $stmt->fetch();
    if (!$response) {
        session_destroy();
        send_error(400);
    }
} else {
    $users = get_users();
    $username = array_search($token, array_map(fn ($val) => $val['token'], $users));

    if ($username === false) {
        send_error(400);
    }

    $response['username'] = $username;
    $response['name'] = $users[$username]['name'];
    $response['token'] = $users[$username]['token'];
    if (isset($users[$username]['admin'])) {
        $response['admin'] = $users[$username]['admin'];
    }
    if (isset($users[$username]['ban'])) {
        $response['ban'] = $users[$username]['ban'];
    }
}

http_response_code(200);
echo json_encode($response);
