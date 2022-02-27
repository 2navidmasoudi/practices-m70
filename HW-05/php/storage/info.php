<?php

include $_SERVER["DOCUMENT_ROOT"] . "/php/variable.php";

function storage_info($id)
{
    global $root;
    $file = file_get_contents("$root/database/storage.json");
    $data = json_decode($file, true) ?? [];
    $storage = $data[$id] ?? null;

    if (!$storage) {
        $storage = [
            $id => [
                "folders" => [],
                "size" => 0,
            ]
        ];
        $json_storage = json_encode($storage, JSON_PRETTY_PRINT);
        file_put_contents("$root/database/storage.json", $json_storage);
    }
    return $storage[$id];
}
