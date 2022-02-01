<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>random table</title>
    <style>
        table,
        td {
            border: 1px solid black;
        }
    </style>
</head>
<?php
$n = rand(1, 10);
$m = rand(1, 10);
?>

<body>
    <table>
        <?php
        for ($i = 0; $i < $n; $i++) { ?>
            <tr>
                <?php
                for ($j = 0; $j < $m; $j++) {
                    echo "<td>" . rand(10, 99) . "</td>";
                } ?>
            </tr>
        <?php
        }
        ?>
    </table>
</body>

</html>