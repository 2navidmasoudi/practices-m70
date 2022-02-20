<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>4 Table</title>
    <link rel="stylesheet" href="style.css">
</head>

<?php
$file = file_get_contents("alotdata.json");
$data = json_decode($file, true);


$entities = $_GET['entities'] ?? 10;
$sort = $_GET['sort'] ?? null;
$page = $_GET['page'] ?? 1;
$max_page = ceil(count($data) / $entities);
$num = 1 + ($page - 1) * $entities;

$data = array_chunk($data, $entities);
echo "<pre>";
print_r($max_page);
echo "</pre>";

?>

<body>
    <h2>Student Data</h2>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
        <label for="sort">Sort by:</label>
        <select name="sort" id="">
            <option value="age_asc">Age (ascending)</option>
            <option value="age_desc">Age (descending)</option>
            <option value="name_asc">Name (ascending)</option>
            <option value="name_desc">Name (descending)</option>
            <option value="school_asc">School (ascending)</option>
            <option value="school_desc">School (descending)</option>
        </select>
        <label for="entities">Result per page:</label>
        <select name="entities" id="">
            <option value="10" <?php if ($entities == 10) echo "selected" ?>>10</option>
            <option value="25" <?php if ($entities == 25) echo "selected" ?>>25</option>
            <option value="50" <?php if ($entities == 50) echo "selected" ?>>50</option>
            <option value="100" <?php if ($entities == 100) echo "selected" ?>>100</option>
        </select>
        <button type="submit">Show Me</button>
    </form>
    <table>
        <tr>
            <th>num</th>
            <th>Name</th>
            <th>Age</th>
            <th>School</th>
        </tr>
        <?php foreach ($data[$page - 1] as $key => $row) { ?>
            <tr>
                <td><?php echo $num++ ?></td>
                <?php foreach ($row as $td) { ?>
                    <td><?php echo $td; ?></td>
                <?php } ?>
            </tr>
        <?php } ?>
    </table>
</body>

</html>