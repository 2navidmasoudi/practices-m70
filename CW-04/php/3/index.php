<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        input {
            display: block;
        }
    </style>
</head>
<?php
$transports = ["Automobile", "Jet", "Ferry", "Subway"];

$more = [];
if (isset($_GET['more'])) {
    $more = explode(',', $_GET['more']);
}
$transports = array_merge($transports, $more);

?>

<body>
    <h2>How Are You Traveling?</h2>
    <ul>
        <?php foreach ($transports as $t) { ?>
            <li><?php echo $t ?></li>
        <?php } ?>
    </ul>

    <form action="/3/response.php">

        <?php if (empty($_GET['more'])) { ?>
            <p>Please add your favorite, local, or even imaginary modes of travel to the list, separated with commas:</p>
        <?php } else { ?>
            <p><b>Add More?</b></p>
        <?php } ?>

        <?php foreach ($more as $in) { ?>
            <input type="hidden" name="more[]" value="<?php echo $in ?>">
        <?php } ?>

        <input type="text" name="more[]" id="" require>

        <button type="submit">Go</button>
    </form>
</body>

</html>