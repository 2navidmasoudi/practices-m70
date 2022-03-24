<?php

include_once "get.php";

header('Content-Type: application/json');

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (strlen($_POST["message"] ?? "") > 100) {
        http_response_code(400);
        echo json_encode([
            "status" => 400,
            "statusText" => "Bad Request"
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
