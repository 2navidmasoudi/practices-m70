<?php

header('Content-type: application/json');

$url = "https://randomuser.me/api/";

$ch = curl_init($url);


// curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
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

// $result = json_encode($result);


$result = curl_exec($ch);

echo $result;
// var_dump($ch);

// $info = curl_getinfo($ch, CURLINFO_HTTP_CODE);
// echo "<pre>";
// var_dump($info);
// echo "</pre>";
// echo "<br>";

// $result = json_decode($result, true);

// echo "<pre>";
// var_dump($result);
// echo "</pre>";
// echo "<br>";

// print_r($result);

// echo date('F,d,Y');
// echo date("Y-m-d H:i:s", time() + 60 * 60 * 24);

$users = [14, 12, 19, 17, 16, 20, 10, 21, 18, 8, 1, 13, "azad 1"];
echo $users[rand(0, count($users) - 1)];
