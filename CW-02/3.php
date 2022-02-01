<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
$id = 'phone';
$tag = 'input';
$type = 'text';
$value = 'شماره تلفن';
?>

<body>
    <?php
    $myElem = "<$tag type='$type' value='$value' id='$id'>";
    echo $myElem . "<br>";
    echo htmlentities($myElem);
    ?>
</body>

</html>