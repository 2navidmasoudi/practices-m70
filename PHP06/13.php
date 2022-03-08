<?php

session_start();

if (!isset($_SESSION['click'])) {
    $_SESSION['click'] = 0;
}

if (isset($_POST['submit'])) {
    $_SESSION['click']++;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post">
        <button type="submit" name="submit"><?php echo $_SESSION['click'] ?></button>
    </form>
</body>

</html>