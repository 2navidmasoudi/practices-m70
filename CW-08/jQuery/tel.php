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
    var_dump($contacts);
    $data = json_encode($contacts, JSON_PRETTY_PRINT);
    file_put_contents('contacts.json', $data);
}
