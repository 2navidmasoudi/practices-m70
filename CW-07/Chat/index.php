<?php
session_start();

if (isset($_SESSION['user']['username'])) {
    header("location: /view/chat/");
} else {
    header("location: /view/login/");
}
