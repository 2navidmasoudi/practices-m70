<?php

$root = realpath(str_replace('\\', '/', $_SERVER['DOCUMENT_ROOT']));
// change this to true if u run live-server
$ALT_SERVER = true;
// change this to php server port
$ALT_PORT = '8080';
// change this to live server port
$LIVE_PORT = '5500';

$root_url = "";

if ($ALT_SERVER) {
    $root_url = "http://127.0.0.1:" . $LIVE_PORT;
}
