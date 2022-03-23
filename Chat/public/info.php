<?php

session_start();
// session_destroy();
extract($_SESSION);

header('Content-Type: application/json');

if (!isset($token)) {
    http_response_code(400);
    session_destroy();
    echo json_encode([
        "status" => 400,
        "statusText" => "Bad Request"
    ]);
    exit;
}

http_response_code(200);
echo json_encode($_SESSION);
