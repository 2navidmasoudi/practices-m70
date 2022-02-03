<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>rtl page</title>
</head>
<?php
$lang = 'fa';
$n = 5;
$dir = $lang == 'fa' ? 'rtl' : 'ltr';
$welcome = $lang == 'en' ? 'Welcome to my site :)' : 'به سایت من خوش آمدید :)';
$opt = $lang == 'en' ? 'option' : 'گزینه ی';
?>
<style>
    body {
        dir: <?php echo $lang == "fa" ? 'rtl' : 'ltr' ?>;
    }

    h1 {
        text-align: center;
    }
</style>

<body>
    <div dir='<?php echo $dir ?>'>
        <?php
        echo "<h1>$welcome</h1>";
        echo "<ul>";
        for ($i = 0; $i < $n; $i++) {
            echo "<li>$opt $i</li>";
        }
        echo "</ul>";
        ?>
    </div>
</body>

</html>