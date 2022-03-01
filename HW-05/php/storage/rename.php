<?php

include $_SERVER["DOCUMENT_ROOT"] . "/php/variable.php";
include_once "$root/php/components/toast.php";



if (isset($_POST['rename_file'])) {
    $path = $_POST['rename_file'];
    $name = $_POST['rename_file_name'];
    rename_file($path, $name);
}

if (isset($_POST['rename_folder'])) {
    $path = $_POST['rename_folder'];
    $name = $_POST['rename_folder_name'];
    rename_folder($path, $name);
}

function rename_file($path, $name)
{
    $old_name = basename($path);
    $ext = pathinfo($path, PATHINFO_EXTENSION);
    $parent_path = preg_replace('/' . preg_quote($old_name, '/') . '$/', '', $path);
    $new_path = "$parent_path/$name.$ext";
    if (!file_exists($new_path)) {
        $result = rename($path, $new_path);
        if ($result) {
            show_toast("Rename file successful.", "success");
            _log("Rename file: $old_name to $name.$ext in $parent_path successful", 'storage');
        } else {
            show_toast("Rename file failed.", "danger");
            _log("Rename file $old_name to $name.$ext in $parent_path failed", 'storage');
        }
    } else {
        show_toast("File already exist.", "danger");
        _log("Rename file $old_name to $name.$ext in $parent_path failed, file already exist", 'storage');
    }
}

function rename_folder($path, $name)
{
    $old_name = basename($path);
    $parent_path = preg_replace('/' . preg_quote($old_name, '/') . '$/', '', $path);
    $new_path = "$parent_path/$name";
    if (!file_exists($new_path)) {
        $result = rename($path, $new_path);
        if ($result) {
            show_toast("Rename successful.", "success");
            _log("Rename folder: $old_name to $name in $parent_path successful", 'storage');
        } else {
            show_toast("Rename failed.", "danger");
            _log("Rename folder $old_name to $name in $parent_path failed", 'storage');
        }
    } else {
        show_toast("Folder already exist.", "danger");
        _log("Rename folder $old_name to $name in $parent_path failed, file already exist", 'storage');
    }
}
