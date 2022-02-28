<?php

if (isset($_POST['rename_folder'])) {
    $path = $_POST['rename_folder'];
    $name = $_POST['rename_folder_name'];
    rename_folder($path, $name);
}

function rename_folder($path, $name)
{
    $old_name = basename($path);
    $parent_path = preg_replace('/' . preg_quote($old_name, '/') . '$/', '', $path);
    $new_path = "$parent_path/$name";
    if (!file_exists($new_path)) {
        $result = rename($path, $new_path);
        if ($result) {
            _log("Rename folder: $old_name to $name in $parent_path successful", 'storage');
        } else {
            _log("Rename folder $old_name to $name in $parent_path failed", 'storage');
        }
    } else {
        _log("Rename folder $old_name to $name in $parent_path failed, file already exist", 'storage');
    }
}
