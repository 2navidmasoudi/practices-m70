<?php

include "error/send.php";

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

if (!$username) {
    sendError('login', 1);
}

if (!$password) {
    sendError('login', 1, "&username=$username");
}

$data = file_get_contents($_SERVER["DOCUMENT_ROOT"] . "/database/user.json");
$users = json_decode($data, true);

$find = array_search($username, array_column($users, 'username'));

if ($find === false) {
    sendError('login', 404, "&username=$username");
}

$user = $users[$find];
$password = hash('sha256', $password);

if ($password != $user['password']) {
    sendError('login', 403, "&username=$username");
}

$token = hash('md5', $username . $password);
header("Location: /src/drive/?token=$token");
