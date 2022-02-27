<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
        }

        iframe {
            width: 100%;
            height: 100vh;
        }
    </style>
</head>
<?php

// initial database :)
if (!file_exists('database')) {
    mkdir('database');
}

header("location: /src/login/");

?>

<body>
    <iframe src="src/login/" frameborder="0"></iframe>
</body>

</html>