<?php

include_once "../functions.php";
include_once "get.php";

header('Content-Type: application/json');

session_start();

$upload_path = "../../db/files";

if (!file_exists($upload_path)) {
    mkdir($upload_path);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $file = $_FILES['file'];

    // $allowedTypes = array(IMAGETYPE_PNG, IMAGETYPE_JPEG, IMAGETYPE_GIF);
    $detectedType = getimagesize($file['tmp_name']);
    if (!$detectedType) {
        http_response_code(400);
        echo json_encode([
            "status" => 400,
            "statusText" => "Bad Request",
            "error" => "File is not an allowed image."
        ]);
        exit;
    }
    $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
    $name = rand_str(10);

    if (move_uploaded_file($file['tmp_name'], $upload_path . "/" . $name)) {
        $chat = get_chat();
        $new_chat = [
            "id" => count($chat ?? []) + 1,
            // "message" => $_POST["message"] ?? "",
            "sender" => [
                "username" => $_SESSION['username'],
                "name" => $_SESSION['name'],
            ],
            "picture" => [
                "path" => "/db/files/" . $name,
                "type" => $ext,
            ]
        ];
        http_response_code(200);
        echo json_encode($new_chat);
        $chat[] = $new_chat;
        $data = json_encode($chat, JSON_PRETTY_PRINT);
        file_put_contents("../../db/chat.json", $data);
    } else {
        http_response_code(500);
        echo json_encode([
            "status" => 500,
            "statusText" => "Internal Server Error",
            "error" => "Server can not upload image file."
        ]);
    }
}
