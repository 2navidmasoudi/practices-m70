<?php

include_once "get.php";

$chat = get_chat();
$chat[] = ["message" => $_GET["message"] ?? ""];
$data = json_encode($chat, JSON_PRETTY_PRINT);
file_put_contents("../../db/chat.json", $data);
