<?php

require_once "database.php";

function get_users()
{

    global $pdo;

    // Added for DBmode
    if (db_mode()) {
        $query = "SELECT * FROM Users";
        $data = $pdo->query($query)->fetchAll();
        $out = array();
        array_walk(
            $data,
            function (&$val) use (&$out) {
                $out[$val['username']] = $val;
            }
        );
        return $out;
    }


    if (!file_exists("../db/users.json")) {
        file_put_contents("../db/users.json", '');
        return [];
    }

    $file = file_get_contents("../db/users.json");
    $data = json_decode($file, true);
    return $data;
}
