<?php

include $_SERVER["DOCUMENT_ROOT"] . "/php/variable.php";
include "$root/php/error/send.php";
include "$root/php/log.php";

// for getting all users from database
include "$root/php/user/get.php";

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

if (!$username) {
    _log('Username field is empty in login', "user");
    sendError('login', 1);
}

if (!$password) {
    _log("$username password is empty in login", "user");
    sendError('login', 1, "&username=$username");
}

$users = get_users();

// find if the user already exist.
$find = array_search($username, array_column($users, 'username'));

// status code 404
// not found.
if ($find === false) {
    _log("$username not found in database for login", "user");
    sendError('login', 404, "&username=$username");
}

$user = $users[$find];
$password = hash('sha256', $password);

if ($password != $user['password']) {
    _log("$username password is wrong in login", "user");
    sendError('login', 403, "&username=$username");
}

$token = hash('md5', $username . $password);
_log("$username with token = $token login successful", "user");
header("Location: /src/drive/?token=$token");
