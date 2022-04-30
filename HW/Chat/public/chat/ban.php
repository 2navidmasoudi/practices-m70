<?php

include_once "get.php";
include_once "../error.php";

header('Content-Type: application/json');

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username ??= $_POST['username'];

    $file = file_get_contents("../../db/users.json");
    $users = json_decode($file, true);

    if (!isset($username) or !isset($users[$username])) {
        send_error(400);
    }

    if (!isset($users[$username]['ban'])) {
        $users[$username]['ban'] = true;
    } else {
        $users[$username]['ban'] = !$users[$username]['ban'];
    }

    $data = json_encode($users, JSON_PRETTY_PRINT);
    file_put_contents("../../db/users.json", $data);

    http_response_code(200);
    echo json_encode([
        "username" => $username,
        "ban" => $users[$username]['ban'],
        "name" => $users[$username]['name']
    ]);
    // $data = json_encode($chat, JSON_PRETTY_PRINT);
    // file_put_contents("../../db/chat.json", $data);
}
