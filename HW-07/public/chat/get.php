<?php

if (!file_exists("../../db")) {
    mkdir("../../db");
}

function get_chat()
{
    if (!file_exists("../../db/chat.json")) {
        file_put_contents("../../db/chat.json", '');
        return [];
    }
    $file = file_get_contents("../../db/chat.json");
    $data = json_decode($file, true);
    if (count($data) != 0)
        return $data;
    return [];
}
