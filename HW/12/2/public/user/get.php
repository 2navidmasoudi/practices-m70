<?php

function get_users()
{
    if (!file_exists("../db/users.json")) {
        file_put_contents("../db/users.json", '');
        return [];
    }

    $file = file_get_contents("../db/users.json");
    $data = json_decode($file, true);
    return $data;
}
