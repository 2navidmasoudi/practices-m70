<?php

include $_SERVER["DOCUMENT_ROOT"] . "/php/variable.php";

function _log($text, $location)
{
    global $root;
    if (!file_exists("$root/log")) {
        mkdir("$root/log");
    }
    file_put_contents(
        "$root/log/log_{$location}.txt",
        "[" . date('D, d M Y H:i:s') . "]: $text ($location)" . "\n",
        FILE_APPEND
    );
}
