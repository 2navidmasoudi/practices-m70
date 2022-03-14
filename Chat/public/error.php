<?php

function send_error($path, $error)
{
    header("location: $path");
    setcookie('error', $error, 0, '/');
    exit;
}

function alert($text)
{
    echo '<div class="alert alert-danger text-start" role="alert">'
        . $text .
        '</div>';
}

function show_error($error)
{
    if (!$error) return;
    $text = "";

    switch ($error) {
        case 1:
            $text = "Please fill out all fields.";
            break;
        case 2:
            $text = "username should be min 3 and max 32 chars (chars and numbers)";
            break;
        case 3:
            $text = "name should be min 3 and max 32 chars (only lowercase and spaces)";
            break;
        case 4:
            $text = "password should be min 4 and max 32 chars";
            break;
        case 404:
            // 404 not found
            $text = "User not found. Please register.";
            break;
        case 403:
            // 403 forbidden
            $text = "Password is wrong.";
            break;
        case 408:
            // 408 add new resource
            $text = "User already exist.";
            break;
        default:
            $text = "Unknown Error";
    }

    alert($text);
}
