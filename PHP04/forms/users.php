<?php

$users = [
    [
        'username' => 'admin',
        'password' => 'user',
    ],
    [
        'username' => 'ehsan',
        'password' => '1234',
    ]
];

$json = json_encode($users);

// echo $json;

$output = json_decode($json, true);

//print_r($output);

// echo $output->username; // if set json_decode false
echo $output[0]['username']; // if set json_decode true
