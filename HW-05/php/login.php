<?php

include "error/send.php";
include "log.php";

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

if (!$username) {
    _log('Username not added', "login");
    sendError('login', 1);
}

if (!$password) {
    _log("$username password not added", "login");
    sendError('login', 1, "&username=$username");
}

$data = file_get_contents($_SERVER["DOCUMENT_ROOT"] . "/database/user.json");
$users = json_decode($data, true) ?? [];

$find = array_search($username, array_column($users, 'username'));

// status code 404
// not found.
if ($find === false) {
    _log("$username not found in database", "login");
    sendError('login', 404, "&username=$username");
}

$user = $users[$find];
$password = hash('sha256', $password);

if ($password != $user['password']) {
    _log("$username password is wrong", "login");
    sendError('login', 403, "&username=$username");
}

$token = hash('md5', $username . $password);
_log("$username with token = $token log in successful", "login");
header("Location: /src/drive/?token=$token");
