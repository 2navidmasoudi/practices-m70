<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    include "table.php";

    $header = new Row(['id', 'name']);
    $row1 = new Row(['1', 'mamad']);
    $row2 = new Row(['2', 'asghar']);
    $row3 = new Row(['3', 'farad', 'eeee']);
    $row4 = new Row(['4', 'javad']);

    $table = new Table($header);
    $table
        ->addRow($row1)
        ->addRow($row2)
        ->addRow($row3)
        ->addRow($row4)
        ->switchRows(1, 2)
        ->setTableClasses(["bg-red", "border"])
        ->setHeaderClasses(["bg-red", "border"])
        ->setCellClasses(["bg-red", "border"]);

    echo $table->toHTML();

    ?>
</body>

</html>