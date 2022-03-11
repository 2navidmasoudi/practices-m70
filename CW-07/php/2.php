<?php

session_start();
// $_SESSION['view'] = isset($_SESSION['view']) ? ++$_SESSION['view'] : 1;
$_SESSION['view'] =  ++$_SESSION['view'] ?? 1;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View</title>
</head>

<body>
    <h2>You visited <?php echo $_SESSION['view'] ?></h2>
    <?php if ($_SESSION['view'] == 1) { ?>
        <h3>You can only see this at first time.</h3>
    <?php } ?>
</body>

</html>