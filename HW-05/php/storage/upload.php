<?php

include $_SERVER["DOCUMENT_ROOT"] . "/php/variable.php";
include_once "$root/php/log.php";
include_once "$root/php/components/toast.php";

if (isset($_POST['upload'])) {
    $path = $_POST['upload'];
    $files = $_FILES['files'];
    upload_storage($path, $files);
}

function upload_storage($path, $files)
{
    $files = $_FILES['files'];
    if (!empty($files)) {
        $files = reArrayFiles($files);
        foreach ($files as $file) {
            $result = move_uploaded_file($file['tmp_name'], "$path/{$file['name']}");
            if ($result) {
                show_toast("upload successful!", "success");
                _log("$path/{$file['name']} size:{$file['size']} uploaded.", "storage");
            } else {
                show_toast("upload failed!", "danger");
                _log("$path/{$file['name']} size:{$file['size']} upload failed.", "storage");
            }
        }
    }
}


function reArrayFiles($file)
{
    $file_ary = array();
    $file_count = count($file['name']);
    $file_key = array_keys($file);

    for ($i = 0; $i < $file_count; $i++) {
        foreach ($file_key as $val) {
            $file_ary[$i][$val] = $file[$val][$i];
        }
    }
    return $file_ary;
}
