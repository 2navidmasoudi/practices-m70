<!DOCTYPE html>
<?php

spl_autoload_register(function ($class_name) {
    include strtolower($class_name) . '.php';
});

function call($class, $method, ...$args)
{
    echo "$class::$method(" . implode(",", $args) . "):";
    var_dump($class::$method(...$args));
    echo "<br>";
}

?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            display: flex;
        }

        @media (max-width: 768px) {
            body {
                display: block;
            }
        }

        div {
            flex: 1;
        }
    </style>
</head>

<body>
    <div>
        <!-- For Input Test -->
        <b>Input Test</b><br>
        <?php
        call("Input", "exists", "get");
        call("Input", "exists", "post");
        call("Input", "get", "name");
        ?>
        <form action="" method="get">
            <input type="text" name="name" placeholder="name">
            <input type="submit" value="send get">
        </form>
        <form action="" method="post">
            <input type="text" name="name" placeholder="name">
            <input type="submit" value="send post">
        </form>
        <br>
        <!-- For Redirect Test -->
        <b>Redirect Test</b><br>
        <?php
        if (isset($_POST['redirect'])) {
            $path = $_POST['location'];
            if (file_exists($path)) {
                Redirect::to($path);
            } else {
                echo "Page not found: 404";
            }
        }
        ?>
        <form action="" method="post">
            <input type="text" name="location" placeholder="page">
            <input type="submit" name="redirect" value="redirect">
        </form>
        <br>
        <!-- Session test -->
        <b>Session Test</b><br>
        <?php
        call("Session", "exists", "name");
        call("Session", "put", "name", "Navid");
        call("Session", "exists", "name");
        call("Session", "get", "name");

        echo "<br>";

        call("Session", "flash", "name");
        call("Session", "exists", "name");

        echo "<br>";

        call("Session", "flash", "name", "mamad");
        call("Session", "exists", "name");

        echo "<br>";

        call("Session", "delete", "name");
        call("Session", "exists", "name");
        ?>
        <br>
    </div>
    <div>
        <!-- Cookie test -->
        <b>Cookie Test</b><br>
        <?php
        call("Cookie", "exists", "name");
        call("Cookie", "put", "name", "Navid", 50000);
        call("Cookie", "exists", "name");
        call("Cookie", "get", "name");

        echo "<br>";

        echo "Notice: uncoment code below to get delete result";
        echo "<br>";
        call("Cookie", "delete", "name");
        call("Cookie", "exists", "name");

        ?>
    </div>
</body>

</html>