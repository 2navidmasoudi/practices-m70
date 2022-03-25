<?php

include_once "get.php";

header('Content-Type: application/json');

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_POST['id'];
    $message = $_POST['message'];

    $chat = get_chat();
    $find = array_search($id, array_column($chat, 'id'));

    if ($find === false) {
        http_response_code(400);
        echo json_encode([
            "status" => 400,
            "statusText" => "Bad Request"
        ]);
        exit;
    }

    $chat[$find]['message'] = $message;
    // $chat[$find]['edited'] = true;
    http_response_code(200);
    echo json_encode($chat[$find]);
    $data = json_encode($chat, JSON_PRETTY_PRINT);
    file_put_contents("../../db/chat.json", $data);
}
