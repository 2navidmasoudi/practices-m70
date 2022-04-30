<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Table</title>
</head>

<?php

include "table.obj.php";

?>

<body class="container pt-3">
    <!-- Internal Render -->
    <?php echo $table->toHTML(); ?>

    <!-- External Render -->
    <table class="<?php echo $table->tableClasses ?>">
        <tr class="<?php echo $table->headerClasses ?>">
            <?php foreach ($header->getValues() as $title) { ?>
                <td><?php echo $title ?></td>
            <?php } ?>
        </tr>
        <?php foreach ($table->getRows() as $row) { ?>
            <tr>
                <?php foreach ($row->getValues() as $cell) { ?>
                    <td class="<?php echo $table->cellClasses ?>">
                        <?php echo $cell ?>
                    </td>
                <?php } ?>
            </tr>
        <?php } ?>
    </table>

</body>

</html>