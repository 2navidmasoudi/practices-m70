<?php

include $_SERVER["DOCUMENT_ROOT"] . "/php/variable.php";
include "$root/php/error/send.php";
include "$root/php/log.php";

// for adding users to database.
include "add.php";

$username = $_POST['username'] ?? '';
$username = strtolower($username);
$password = $_POST['password'] ?? '';
$confirm = $_POST['confirm'] ?? '';

if (!$username) {
    _log('Username field is empty in register', "user");
    sendError('register', 1);
}

if (!$password) {
    _log("$username password field is empty in register", "user");
    sendError('register', 1, "&username=$username");
}

if ($password != $confirm) {
    _log("$username password not matched in register", "user");
    sendError('register', 2, "&username=$username");
}

$users = get_users();

// find if the user already exist.
$find = array_search($username, array_column($users, 'username'));

if ($find !== false) {
    _log("$username found in database for register", "user");
    sendError('login', 408, "&username=$username");
}

$password = hash('sha256', $password);
$token = hash('md5', $username . $password);

$newUser = [
    "username" => $username,
    "password" => $password,
    "token" => $token,
];

$result = add_user($newUser);

if ($result !== false) {
    _log("$username with token = $token register succesful", "user");
    header("Location: /src/drive/?token=$token");
} else {
    _log("$username failed to add in database", "user");
    sendError('register', 500, "&username=$username");
}
