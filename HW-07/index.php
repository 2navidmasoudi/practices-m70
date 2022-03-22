<?php

// initialize database
if (!file_exists("db")) {
    mkdir("db");
}

session_start();

// login in users has token before.
if (isset($_SESSION['token'])) {
    header("location: /view/chat/");
} else {
    header("location: /view/login/");
}
