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
