<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Text Editor using php</title>
</head>

<style>
    p {
        font-size: 20px;
    }
</style>

<body style="padding-left: 10px;">
    <form action="" method="post">
        <p>
            Write your text here:
            <input type="text" name="txt">
        </p>
        <p>
            Fontsize here:
            <input type="number" name="size">
            px
        </p>
        <p>
            and the color:
            <input type="color" name="clr">
        </p>

        <input type="submit" value="Show Me!">
    </form>

    <?php

    // We get color, text and size by post method in form and output in php :)
    $myColor ??= $_POST['clr'];
    $myText ??= $_POST['txt'];
    $myNumber ??= $_POST['size'] . 'px';

    echo "<p style='font-size: $myNumber;color: $myColor'>$myText<p/>";

    ?>

</body>

</html>