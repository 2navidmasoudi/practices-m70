<?php

session_start();
$user_data = $_SESSION['user'] ?? [];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show User</title>
</head>

<body>
    <?php if (count($user_data)) { ?>
        <ul>
            <?php foreach ($user_data as $key => $value) { ?>
                <?php if ($value) { ?>
                    <li><?php echo "$key: $value" ?></li>
                <?php } ?>
            <?php } ?>
        </ul>
    <?php } ?>

</body>

</html>