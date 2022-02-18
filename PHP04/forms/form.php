<?php

// header('Content-type: application/json');

// echo json_encode($_POST, JSON_PRETTY_PRINT);

if (!empty($_POST['username'])) {
    $username = $_POST['username'];

    $message = "Hello " . $username;

    header("Location: /index.php?message={$message}&username={$username}");
} else {
    $error = "Please fill your username";
    header("Location: /index.php?error=$error");
}
