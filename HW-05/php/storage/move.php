<?php

include $_SERVER["DOCUMENT_ROOT"] . "/php/variable.php";
include_once "$root/php/log.php";
include_once "$root/php/components/toast.php";

if (isset($_POST['move'])) {
    $path = $_POST['move'];
    move_storage($path);
}

function move_storage($path)
{
    global $root;
    $files = scandir($path);
    foreach ($files as $file) {
        if ($file === '.' || $file === '..') {
            continue;
        }
        $from = $path . '/' . $file;
        $parent_path = preg_replace('/' . preg_quote($file, '/') . '$/', '', $path);
        $parent_name = "/" . basename($parent_path);
        $grand_path = preg_replace('/' . preg_quote($parent_name, '/') . '$/', '', $parent_path);
        $new_path = "$grand_path/$file";
        rename($from, $new_path);
    }
    $result = rmdir($path);
    if ($result) {
        show_toast("folder moved successfully.", "success");
        _log(str_replace($root, "", $path) . " folder moved to parent", 'storage');
    } else {
        show_toast("folder move failed.", "danger");
        _log(str_replace($root, "", $path) . " folder move failed", 'storage');
    }
}
