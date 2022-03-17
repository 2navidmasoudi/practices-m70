<?php

if (isset($_POST['submit'])) {
    extract($_POST);
    $file = file_get_contents('contacts.json');
    $contacts = json_decode($file, true);
    $contacts[] = [
        "fname" => $fname,
        "lname" => $lname,
        "tel" => $tel,
        "gender" => $gender,
        "detail" => $detail,
    ];
    $data = json_encode($contacts, JSON_PRETTY_PRINT);
    echo $data;
    file_put_contents('contacts.json', $data);
}

if (isset($_GET)) {
    $file = file_get_contents('contacts.json');
    $contacts = json_decode($file, true);
    $data = json_encode($contacts, JSON_PRETTY_PRINT);
    echo $data;
}
