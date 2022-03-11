<?php

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    foreach ($_POST as $key => $post_data) {
        $_SESSION['user'][$key] = $post_data;
    }
}

$user_data = $_SESSION['user'] ?? [];

$users = [1, 14, 5, 8, 13, 16];
echo $users[rand(0, count($users) - 1)];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Save User</title>
</head>

<body>
    <form action="" method="post">
        <input type="text" name="first_name" placeholder="first name" value="<?php echo $user_data['first_name'] ?>">
        <input type="text" name="last_name" placeholder="last name" value="<?php echo $user_data['last_name'] ?>">
        <input type="number" name="age" placeholder="age" value="<?php echo $user_data['age'] ?>">
        <input type="email" name="email" placeholder="email" value="<?php echo $user_data['email'] ?>">
        <button type="submit">Submit</button>
    </form>
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