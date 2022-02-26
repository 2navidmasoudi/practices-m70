<?php

include "error/send.php";
include "log.php";

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';
$confirm = $_POST['confirm'] ?? '';



if (!$username) {
    _log('Username not added', "register");
    sendError('register', 1);
}

if (!$password) {
    _log("$username password not added", "register");
    sendError('register', 1, "&username=$username");
}

if ($password != $confirm) {
    _log("$username password not matched", "register");
    sendError('register', 2, "&username=$username");
}

$data = file_get_contents($_SERVER["DOCUMENT_ROOT"] . "/database/user.json");
$users = json_decode($data, true) ?? [];

$find = array_search($username, array_column($users, 'username'));

if ($find !== false) {
    _log("$username found in database", "register");
    sendError('login', 408, "&username=$username");
}

$password = hash('sha256', $password);
$token = hash('md5', $username . $password);

$newUser = [
    "username" => $username,
    "password" => $password,
];

$users = array_merge($users, [$newUser]);
$data = json_encode($users, JSON_PRETTY_PRINT);
$result = file_put_contents($_SERVER["DOCUMENT_ROOT"] . "/database/user.json", $data);

if ($result !== false) {
    $token = hash('md5', $username . $password);
    _log("$username with token = $token added to database", "register");
    header("Location: /src/drive/?token=$token");
} else {
    sendError('register', 500, "&username=$username");
    _log("$username failed to add in database", "register");
}
