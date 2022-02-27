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
// include "$root/php/storage/check.php";
// include "$root/php/storage/info.php";
$token = $_GET['token'] ?? '1f7501cb3c02a15621cd6b5638b00eed';
if (!file_exists("$root/database/directory.json")) {
    echo "no file exits";
}
$user = user_info($token);
// $storage = check_storage($token);
$directory = get_directory($token);

// $info = storage_info($storage);

?>

<body class="text-center bg-dark text-light">

    <main class="container">
        <h1>Welcome to Drive!</h1>
    </main>
</body>

</html>