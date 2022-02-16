<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cards</title>
    <link rel="stylesheet" href="style.css">
</head>

<?php

// default language
$language = "en";
$dir = "ltr";

// we get data from server (here just local data)
$file = file_get_contents("data.json");
$data = json_decode($file, true)[$language];

// multi language can be translated here
$i18n = file_get_contents("i18n.json");
$translate = json_decode($i18n, true);

// translator function for everywhere we need.
function translator($str)
{
    global $translate;
    global $language;
    if ($language == "en") return $str;
    return $translate[$language][$str];
}

// MAGIC :D
if ($_SERVER['REQUEST_METHOD'] == "GET" and isset($_GET['lang'])) {
    if ($_GET['lang'] == 'fa') {
        $language = 'fa';
        $dir = "rtl";
    }
    if ($_GET['lang'] == 'en') {
        $language = 'en';
        $dir = "ltr";
    }
    // other languages... (I just know farsi and a little english :( ))
}
?>

<body dir="<?php echo $dir ?>">
    <div class="wide-container">

        <section class="latest-challenge">
            <!-- Want to change language? no problem. -->
            <form action="">
                <?php if ($language == "en") { ?>
                    <button type="submit" name="lang" value="fa">Change Language to Farsi</button>
                <?php } ?>
                <?php if ($language == "fa") { ?>
                    <button type="submit" name="lang" value="en">تغییر زبان به انگلیسی</button>
                <?php } ?>
            </form>
            <div class="container">
                <h2 class="heading"><?php echo translator("Latest Challenges") ?></h2>
                <ul class="list">
                    <?php foreach ($data as $cardData) { ?>
                        <div class="card">
                            <div class="flag-container">
                                <span class="flag-align">
                                    <?php foreach ($cardData['flags'] as $flag) { ?>
                                        <span class="flag <?php echo $flag ?>">
                                            <?php echo translator($flag) ?>
                                        </span>
                                    <?php } ?>
                                </span>
                            </div>
                            <div class="image-container">
                                <a href="/" class="image-link">
                                    <img src="./assets/img/<?php echo $cardData["id"] ?>.jpg" alt="">
                                </a>
                            </div>
                            <div class="content">
                                <h3 class="title"><?php echo $cardData["title"] ?></h3>
                                <div class="subtitle">
                                    <ul class="category-list">
                                        <?php foreach ($cardData["categories"] as $category) { ?>
                                            <li class="<?php echo $category ?>">
                                                <?php echo $category ?>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                    <div>
                                        <span class="difficulty-container <?php echo $cardData["difficulty_name"] ?>">
                                            <span class="difficulty-level"><?php echo $cardData["difficulty"] ?></span>
                                            <span class="difficulty-text"><?php echo translator($cardData["difficulty_name"]) ?></span>
                                        </span>
                                    </div>
                                </div>
                                <div class="text-container">
                                    <p class="text">
                                        <?php echo $cardData["text"] ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </ul>
            </div>
        </section>
    </div>
</body>

</html>