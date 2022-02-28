<?php

include $_SERVER["DOCUMENT_ROOT"] . "/php/variable.php";

function rand_str($n)
{
    $str = [...range('a', 'z'), ...range('A', 'Z'), ...range(0, 9)];
    $rand_text = "";
    for ($i = 0; $i < $n; $i++) {
        $rand_text .= $str[rand(0, count($str) - 1)];
    }
    return $rand_text;
}

function sort_dir_files($dir)
{
    $sortedData = array();
    foreach (scandir($dir) as $file) {
        if (is_file($dir . '/' . $file))
            array_push($sortedData, $file);
        else
            array_unshift($sortedData, $file);
    }
    return $sortedData;
}

function listFolderFiles($dir)
{
    global $root;
    $ffs = sort_dir_files($dir);

    unset($ffs[array_search('.', $ffs, true)]);
    unset($ffs[array_search('..', $ffs, true)]);

    // prevent empty ordered elements
    if (count($ffs) < 1)
        return;

    foreach ($ffs as $key => $ff) {
        if (is_dir($dir . '/' . $ff)) {
            $ffs[$dir . '/' . $ff] = listFolderFiles($dir . '/' . $ff);
        } else {
            $ffs[$ff] = [
                "name" => $ff,
                "path" => "$dir/$ff",
                "size" => filesize("$dir/$ff"),
                "parent" => $dir,
                "relative" => str_replace($root, "", "$dir/$ff"),
                "ext" => pathinfo("$dir/$ff", PATHINFO_EXTENSION),
            ];
        }
        unset($ffs[$key]);
    }
    return $ffs;
}
