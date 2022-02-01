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
$n = 5;
$m = 7;

$myArr = [];
$sum = [];
for ($i = 0; $i < $n; $i++) {
    for ($j = 0; $j < $m; $j++) {
        $myArr[$i][$j] = rand(10, 99);
    }
}

for ($j = 0; $j < $m; $j++) {
    $sum[] = 0;
    for ($i = 0; $i < $n; $i++) {
        $sum[$j] += $myArr[$i][$j];
    }
}
?>

<body>
    <table>
        <?php
        for ($i = 0; $i < $n; $i++) { ?>
            <tr>
                <?php
                for ($j = 0; $j < $m; $j++) {
                    if ($myArr[$i][$j] % 2 != 0) {
                        echo "<td style='background-color: red; color: white'>" . $myArr[$i][$j] . "</td>";
                    } elseif ($myArr[$i][$j] % 6 == 0) {
                        echo "<td><b><i>" . $myArr[$i][$j] . "</i></b></td>";
                    } else {
                        echo "<td>" . $myArr[$i][$j] . "</td>";
                    }
                }
                ?>
            </tr>

        <?php
        }
        ?>
        <tr>
            <?php
            for ($j = 0; $j < $m; $j++) {
                echo "<td>" . $sum[$j] . "</td>";
            }
            ?>
        </tr>
    </table>
</body>

</html>