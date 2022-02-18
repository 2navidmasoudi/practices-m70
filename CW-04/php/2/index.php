<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>How's your weather?</h2>
    <?php if (empty($_GET['response'])) { ?>

        <form action="response.php" method="get">
            <p>Please Enter your information:</p>
            <label for="city">City:</label>
            <input type="text" name="city" id="">
            <label for="month">Month:</label>
            <input type="text" name="month" id="">
            <label for="year">Year:</label>
            <input type="number" name="year" id="">

            <p>Please choose the kind of weather you experienced from list below.</p>
            <p>Choose all that apply.</p>

            <input type="checkbox" name="weather[]" id="" value="Sunshine">
            <label for="">Sunshine</label>
            <br>
            <input type="checkbox" name="weather[]" id="" value="Clouds">
            <label for="">Clouds</label>
            <br>
            <input type="checkbox" name="weather[]" id="" value="Rain">
            <label for="">Rain</label>
            <br>
            <input type="checkbox" name="weather[]" id="" value="Hail">
            <label for="">Hail</label>
            <br>
            <input type="checkbox" name="weather[]" id="" value="Sleet">
            <label for="">Sleet</label>
            <br>
            <input type="checkbox" name="weather[]" id="" value="Snow">
            <label for="">Snow</label>
            <br>
            <input type="checkbox" name="weather[]" id="" value="Wind">
            <label for="">Wind</label>
            <br>
            <input type="checkbox" name="weather[]" id="" value="Cold">
            <label for="">Cold</label>
            <br>
            <input type="checkbox" name="weather[]" id="" value="Heat">
            <label for="">Heat</label>
            <br>

            <button type="submit">Go</button>
        <?php } else { ?>
            <p>
                In <?php echo $_GET['city'] ?? '' ?>
                in the month of <?php echo $_GET['month'] ?? '' ?>
                <?php echo $_GET['year'] ?? '' ?>,
                you observed the following weather:
            </p>
            <ul>
                <?php foreach ($_GET['weather'] as $w) { ?>
                    <li><?php echo $w ?></li>
                <?php } ?>
            </ul>
            <form action="/2/" method="post">
                <button type="submit">Back</button>
            </form>
        <?php } ?>

        </form>
</body>

</html>