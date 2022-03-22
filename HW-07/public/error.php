<?php

function send_error($error = 500)
{
    $response['statusCode'] = $error;
    $response['message'] = message_error($error);
    $response['status'] = 'error';
    header("HTTP/1.1 $error {$response['message']}");

    // http_response_code($error);

    if ($error < 5) {
        // http_response_code(422);
        $response['statusCode'] = 422;
        header("HTTP/1.1 422 Invalid format");
    }

    echo json_encode($response);
    exit;
}

function message_error($error)
{
    if (!$error) return;
    $message = "";

    switch ($error) {
            // 422 unproccessable entity
        case 1:
            $message = "Please fill out all fields.";
            break;
        case 2:
            $message = "username should be min 3 and max 32 chars (chars and numbers)";
            break;
        case 3:
            $message = "name should be min 3 and max 32 chars (only lowercase and spaces)";
            break;
        case 4:
            $message = "password should be min 4 and max 32 chars";
            break;
        case 404:
            // 404 not found
            $message = "User not found. Please register.";
            break;
        case 403:
            // 403 forbidden
            $message = "Password is wrong.";
            break;
        case 408:
            // 408 add new resource
            $message = "User already exist.";
            break;
        default:
            $message = "Unknown Error";
    }

    return $message;
}
