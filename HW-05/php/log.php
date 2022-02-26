<?php

function _log($text, $location)
{
    file_put_contents(
        $_SERVER['DOCUMENT_ROOT'] . "/log/log_{$location}.txt",
        "[" . date('D, d M Y H:i:s') . "]: $text ($location)" . "\n",
        FILE_APPEND
    );
}
