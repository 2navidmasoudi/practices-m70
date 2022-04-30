<?php

include_once "get.php";
include_once "../error.php";

header('Content-Type: application/json');

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (strlen($_POST["message"] ?? "") > 100) {
        send_error(400);
    }

    $username = $_SESSION['username'];

    $file = file_get_contents("../../db/users.json");
    $users = json_decode($file, true);

    if (isset($users[$username]['ban']) and $users[$username]['ban']) {
        http_response_code(403);
        echo json_encode([
            "status" => 403,
            "statusText" => "Permission denied",
            "error" => "You are banned from sending message."
        ]);
        exit;
    }

    $chat = get_chat();
    $new_chat = [
        "id" => count($chat ?? []) + 1,
        "message" => $_POST["message"] ?? "",
        "sender" => [
            "username" => $_SESSION['username'],
            "name" => $_SESSION['name'],
        ]

    ];
    http_response_code(200);
    echo json_encode($new_chat);
    $chat[] = $new_chat;
    $data = json_encode($chat, JSON_PRETTY_PRINT);
    file_put_contents("../../db/chat.json", $data);
}
