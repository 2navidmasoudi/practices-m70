<?php

header('content-type: application/json');

$url = "https://jsonplaceholder.typicode.com/posts";

$ch = curl_init();


curl_setopt($ch, CURLOPT_URL, $url);
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, ["Content-type: application/json"]);


// curl_setopt_array($ch, [
//     CURLOPT_RETURNTRANSFER => true,
//     CURLOPT_URL => $url,
//     CURLOPT_POST => true,
//     CURLOPT_POSTFIELDS => json_encode([
//         "text" => "Salam",
//         "title" => "HELLO",
//     ]),
//     CURLOPT_HTTPHEADER => ["Content-type: application/json"],

// ]);



// var_dump($ch);
$result = curl_exec($ch);

// $info = curl_getinfo($ch, CURLINFO_HTTP_CODE);
// echo "<pre>";
// var_dump($info);
// echo "</pre>";
// echo "<br>";

// $result = json_decode($result, true);

// echo "<pre>";
var_dump($result);
// echo "</pre>";
// echo "<br>";

// print_r($result);
