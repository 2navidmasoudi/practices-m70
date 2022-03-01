<?php

include $_SERVER["DOCUMENT_ROOT"] . "/php/variable.php";
include_once "$root/php/log.php";
include_once "$root/php/components/toast.php";

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
            show_toast("file deleted successfully.", "success");
            _log(str_replace($root, "", $path) . " file deleted", 'storage');
        } else {
            show_toast("file delete failed.", "danger");
            _log(str_replace($root, "", $path) . " file delete failed", 'storage');
        }
    } else {
        $result = xrmdir($path);
        if ($result) {
            show_toast("folder deleted successfully.", "success");
            _log(str_replace($root, "", $path) . " folder deleted", 'storage');
        } else {
            show_toast("folder delete failed.", "danger");
            _log(str_replace($root, "", $path) . " folder delete failed", 'storage');
        }
    }
}

function xrmdir($dir)
{
    $items = scandir($dir);
    foreach ($items as $item) {
        if ($item === '.' || $item === '..') {
            continue;
        }
        $path = $dir . '/' . $item;
        if (is_dir($path)) {
            xrmdir($path);
        } else {
            unlink($path);
        }
    }
    return rmdir($dir);
}
