<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Signin Template · Bootstrap v5.1</title>


    <!-- Bootstrap core CSS -->
    <link href="/assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="style.css" rel="stylesheet">
</head>
<?php

$error = $_GET['error'] ?? '';
$username = $_GET['username'] ?? '';

include $_SERVER['DOCUMENT_ROOT'] . "/php/error/show.php";
?>

<body class="text-center bg-dark text-light">

    <main class="container">
        <h1>Welcome to Drive!</h1>
    </main>
</body>

</html>