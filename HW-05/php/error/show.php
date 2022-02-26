<?php

function redError($text)
{
    echo '<div class="alert alert-danger text-start" role="alert">'
        . $text .
        '</div>';
}

function showError($error)
{
    if (!$error) return;
    $text = "";
    if ($error == 1) {
        $text = "Please fill out all fields.";
        redError($text);
        return;
    }
    if ($error == 2) {
        $text = "Password confirm does not match.";
        redError($text);
        return;
    }
    if ($error == 404) {
        $text = "User not found. Please register.";
        redError($text);
        return;
    }
    if ($error == 403) {
        $text = "Password is wrong.";
        redError($text);
        return;
    }
}
