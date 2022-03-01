<?php

include $_SERVER["DOCUMENT_ROOT"] . "/php/variable.php";
include_once "$root/php/log.php";
include_once "$root/php/components/toast.php";

if (isset($_POST['new_folder'])) {
    $path = $_POST['new_folder'];
    $name = $_POST['new_folder_name'];
    add_folder($path, $name);
}

function add_folder($path, $name)
{
    $folder = "$path/$name";
    if (!file_exists($folder)) {
        $result = mkdir($folder);
        if ($result) {
            show_toast("New folder created.", "success");
            _log("new folder $folder created", 'storage');
        } else {
            show_toast("Can't create folder!", "danger");
            _log("new folder $folder creation failed", 'storage');
        }
    } else {
        show_toast("Folder already exist.", "danger");
        _log("$folder creation failed, already exist", 'storage');
    }
}

function add_storage($directory, $path = null)
{
    global $root;
    if (!file_exists("$root/storage/$directory{$path}")) {
        _log("storage $directory{$path} created", 'storage');
        mkdir("$root/storage/$directory{$path}");
    }
}
