<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Drive</title>
    <link href="/assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link href="style.css" rel="stylesheet">
</head>




<?php
include $_SERVER['DOCUMENT_ROOT'] . "/php/variable.php";
include "$root/php/user/info.php";
include "$root/php/directory/get.php";
include "$root/php/storage/get.php";
include "$root/php/storage/show.php";
include "$root/php/storage/rename.php";
include "$root/php/storage/delete.php";
include_once "$root/php/function.php";

$token = $_GET['token'] ?? 'c7192cc967da3f6a772c2c0cb64e1994';

// check if the token is valid and return user information.
$user = user_info($token);

// get the directory from token, if not exist makes one.
$directory = get_directory($token);

// storage is basiclly everything user makes or uploads.
$storage = get_storage($directory);
// rename("/home/navidm/MaktabSharif70/HW-05/storage/DuMv9YcHPi/asd/asdzxc copy", "/home/navidm/MaktabSharif70/HW-05/storage/DuMv9YcHPi/asd/salam");
?>

<body class="bg-dark text-light">
    <main class="container">
        <h1 class="text-center my-5">Hello <?php echo ucwords($user['name']) ?>, Welcome to Drive!</h1>
        <section>
            <?php show_storage($storage); ?>
        </section>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>