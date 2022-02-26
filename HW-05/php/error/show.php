<?php

function alert($text)
{
    echo '<div class="alert alert-danger text-start" role="alert">'
        . $text .
        '</div>';
}

function showError($error)
{
    if (!$error) return;
    $text = "";

    switch ($error) {
        case 1:
            $text = "Please fill out all fields.";
            break;
        case 2:
            $text = "Password confirm does not match.";
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
