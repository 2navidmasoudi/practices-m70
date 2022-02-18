<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        label {
            display: block;
        }

        button {
            margin-top: 20px;
            display: block;
        }
    </style>
</head>

<?php
include "response.php"
?>

<body>
    <h1>Pick a day</h1>
    <?php if (empty($_GET['response'])) { ?>
        <!-- <form action="response.php" method="post"> -->
        <form action="" method="post">
            <label for="week">Please chose a day</label>
            <select name="day" id="week">
                <option value="monday">Monday</option>
                <option value="tuesday">Tuesday</option>
                <option value="wednesday">Wednesday</option>
                <option value="thursday">Thursday</option>
                <option value="friday">Friday</option>
                <option value="saturday">Saturday</option>
            </select>
            <button type="submit">Go</button>
        </form>
    <?php } else { ?>
        <p><?php echo $_GET['response'] ?></p>
        <form action="/1/" method="post">
            <button type="submit">Back</button>
        </form>
    <?php } ?>
</body>

</html>