<?php

include $_SERVER["DOCUMENT_ROOT"] . "/php/variable.php";
include_once "$root/php/function.php";

function storage_info($directory)
{
    global $root;
    // var_dump($directory);
    $path = "$root/storage/";
    return listFolderFiles($path . $directory);
}
