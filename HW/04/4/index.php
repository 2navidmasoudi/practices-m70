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

// data per page
$entities = $_GET['entities'] ?? 25;
$sort = $_GET['sort'] ?? null;
$page = $_GET['page'] ?? 1;

// max page usefull for pagination
$max_page = ceil(count($data) / $entities);

// just starting number of datas in pages.
$num = 1 + ($page - 1) * $entities;

// usort for sorting
if ($sort == "age_asc") {
    usort($data, fn ($a, $b) => $a['age'] - $b['age']);
}
if ($sort == "name_asc") {
    usort($data, fn ($a, $b) => $a['name'] > $b['name']);
}
if ($sort == "school_asc") {
    usort($data, fn ($a, $b) => $a['school'] > $b['school']);
}
if ($sort == "age_desc") {
    usort($data, fn ($a, $b) => $b['age'] - $a['age']);
}
if ($sort == "name_desc") {
    usort($data, fn ($a, $b) => $b['name'] > $a['name']);
}
if ($sort == "school_desc") {
    usort($data, fn ($a, $b) => $b['school'] > $a['school']);
}

// array chunk is usefull for pagination
$data = array_chunk($data, $entities);

?>

<body>
    <h2>Student Data</h2>

    <!-- Pagination -->
    <div class="pagination">
        <a <?php if ($page == 1) echo 'class="disabled"' ?> href="<?php if ($page != 1) echo $_SERVER['PHP_SELF'] . '?page=' . ($page - 1) . '&sort=' . $sort . '&entities=' . $entities; ?>">&laquo;</a>
        <?php for ($i = 1; $i <= $max_page; $i++) { ?>
            <a <?php if ($i == $page) echo 'class="active disabled"'; ?> href="<?php echo $_SERVER['PHP_SELF'] . '?page=' . $i . '&sort=' . $sort . '&entities=' . $entities; ?>">
                <?php echo $i ?>
            </a>
        <?php } ?>
        <a <?php if ($page == $max_page) echo 'class="disabled"' ?> href="<?php if ($page != $max_page) echo $_SERVER['PHP_SELF'] . '?page=' . ($page + 1) . '&sort=' . $sort . '&entities=' . $entities; ?>">&raquo;</a>
    </div>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
        <!-- Sort -->
        <label for="sort">Sort by:</label>
        <select name="sort" id="">
            <option value="none">none</option>
            <option value="age_asc" <?php if ($sort == "age_asc") echo "selected" ?>>Age (ascending)</option>
            <option value="age_desc" <?php if ($sort == "age_desc") echo "selected" ?>>Age (descending)</option>
            <option value="name_asc" <?php if ($sort == "name_asc") echo "selected" ?>>Name (ascending)</option>
            <option value="name_desc" <?php if ($sort == "name_desc") echo "selected" ?>>Name (descending)</option>
            <option value="school_asc" <?php if ($sort == "school_asc") echo "selected" ?>>School (ascending)</option>
            <option value="school_desc" <?php if ($sort == "school_desc") echo "selected" ?>>School (descending)</option>
        </select>

        <!-- Data per page -->
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
                <!-- we ++ the num for each loop accure -->
                <td><?php echo $num++ ?></td>

                <?php foreach ($row as $td) { ?>
                    <td><?php echo $td; ?></td>
                <?php } ?>
            </tr>
        <?php } ?>
    </table>
</body>

</html>