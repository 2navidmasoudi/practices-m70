<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>
</head>


<body>
    <?php if (isset($_GET['message'])) { ?>
        <p><?php echo $_GET['message'] ?></p>
    <?php } ?>

    <?php if (isset($_GET['error'])) { ?>
        <p style="color: red;"><?php echo $_GET['error'] ?></p>
    <?php } ?>

    <form action="/form.php" method="post">
        <input type="text" name="username" required value="<?php echo $_GET['username'] ?? '' ?>">
        <button type="submit">Submit</button>
    </form>
</body>

</html>