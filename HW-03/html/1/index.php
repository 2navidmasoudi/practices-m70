<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Table</title>
</head>

<?php
$file = file_get_contents("data.json");
$data = json_decode($file, true);
$heading = array_keys($data[0] ?? []);
?>

<body>
    <table>
        <tr>
            <?php foreach ($heading as $value) { ?>
                <th><?php echo $value ?></th>
            <?php } ?>
        </tr>
        <?php foreach ($data as $row) { ?>
            <tr>
                <?php foreach ($row as $value) { ?>
                    <td><?php echo $value ?></td>
                <?php } ?>
            </tr>
        <?php } ?>
    </table>
</body>

</html>