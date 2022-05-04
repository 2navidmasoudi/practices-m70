<?php

header('Content-Type: application/json');

if (!file_exists("../../db/chat.json")) {
    file_put_contents("../../db/chat.json", '');
}

function get_chat()
{
    $file = file_get_contents("../../db/chat.json");
    $data = json_decode($file, true);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    echo file_get_contents("../../db/chat.json");
}
