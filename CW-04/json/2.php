<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            border-collapse: collapse;
        }

        td,
        tr,
        th {
            border: 1px solid black;
        }

        td {
            padding: 0 20px 0 5px;
        }
    </style>
</head>
<?php

$file = file_get_contents("1.json");
$data = json_decode($file, true);

?>

<body>
    <table>
        <tr>
            <?php foreach ($data[0] as $key => $value) { ?>
                <th><?php echo $key ?></th>
            <?php } ?>
        </tr>
        <?php foreach ($data as $key => $value) { ?>
            <tr>
                <?php foreach ($value as $v) { ?>
                    <td><?php echo $v ?></td>
                <?php } ?>
            </tr>
        <?php } ?>
    </table>
</body>

</html>