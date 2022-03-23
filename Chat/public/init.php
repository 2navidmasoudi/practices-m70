<?php

include_once "root.php";
// initialize database
if (!file_exists("../db")) {
    mkdir("../db");
}

header('Content-Type: application/json');

session_start();

// login in users has token before.
if (isset($_SESSION['token'])) {
    $response['location'] = '/view/chat/';
} else {
    $response['location'] = '/view/login/';
}

echo json_encode($response);
