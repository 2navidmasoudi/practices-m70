<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Document</title>
</head>

<body class="container pt-3">
    <?php

    include "table/row.inc.php";
    include "table/table.inc.php";

    $header = new Row(['id', 'name', 'age']);
    $row1 = new Row(['1', 'mamad', 23]);
    $row2 = new Row(['2', 'asghar', 30]);
    $row3 = new Row(['3', 'javad', 40]);
    $row4 = new Row(['4', 'farad', 99, 'eeee']);

    $table = new Table($header);
    $table
        ->addRow($row1)
        ->addRow($row2)
        ->addRow($row3)
        ->addRow($row4)
        ->switchRows(1, 2)
        ->setTableClasses(["table", "table-striped", "table-hover", "shadow"])
        ->setHeaderClasses(["text-center", "table-dark", "fw-bold"])
        ->setCellClasses(["align-middle", "border-2", "border-red"]);

    echo $table->toHTML();

    ?>
</body>

</html>