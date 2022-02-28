<?php

include $_SERVER["DOCUMENT_ROOT"] . "/php/variable.php";
include_once "$root/php/log.php";

if (isset($_POST['delete'])) {
    $path = $_POST['delete'];
    delete_storage($path);
}

function delete_storage($path)
{
    global $root;
    if (is_file($path)) {
        $result = unlink($path);
        if ($result) {
            _log(str_replace($root, "", $path) . " file deleted", 'storage');
        } else {
            _log(str_replace($root, "", $path) . " file delete failed", 'storage');
        }
    } else {
        $result = rmdir($path);
        if ($result) {
            _log(str_replace($root, "", $path) . " folder deleted", 'storage');
        } else {
            _log(str_replace($root, "", $path) . " folder delete failed", 'storage');
        }
    }
}
