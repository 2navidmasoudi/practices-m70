<?php

spl_autoload_register('autoLoader');

function autoLoader($className)
{
    // $url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

    // if (strpos($url, 'includes') !== false) {
    //     $path = "../classes/";
    // } else {
    //     $path = "classes/";
    // }

    $path = "classes/";
    $ext = ".class.php";
    echo "ClassName: " . $className .  PHP_EOL;
    $name = basename(str_replace("\\", "/", $className));
    $full = $path . $name . $ext;

    echo "Fullpath: $full" . PHP_EOL;
    require_once $full;
}
