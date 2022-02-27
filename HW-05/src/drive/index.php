<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Drive</title>
    <link href="/assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
</head>
<?php
include $_SERVER['DOCUMENT_ROOT'] . "/php/variable.php";
include "$root/php/user/info.php";
include "$root/php/directory/get.php";
include "$root/php/storage/get.php";

$token = $_GET['token'] ?? '8ff590ecd78b627ba6b458c2b13f56ee';
$user = user_info($token);
$directory = get_directory($token);
$storage = get_storage($directory);

var_dump($storage);

// $info = storage_info($storage);

?>

<body class="text-center bg-dark text-light">
    <main class="container">
        <h1>Welcome to Drive!</h1>
    </main>
</body>

</html>