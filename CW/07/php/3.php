<?php

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    foreach ($_POST as $key => $post_data) {
        $_SESSION['font'][$key] = $post_data;
    }
    // setcookie('font-style', $_POST['font-style']);
    // setcookie('font-size', $_POST['font-size']);
    // setcookie('font-dir', $_POST['font-dir']);
}
$fontStyle = $_SESSION['font']['font-style'] ?? $_COOKIE['font-style'];
$fontSize = $_SESSION['font']['font-size'] ?? $_COOKIE['font-size'];
$fontDir = $_SESSION['font']['font-dir'] ?? $_COOKIE['font-dir'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body style="font-size: <?php echo $fontSize ? $fontSize . "px" : "" ?>;
            font-family: <?php echo $fontStyle ?>;
            direction: <?php echo $fontDir ?>;">
    <form action="" method="post">
        <div>
            <label for="input-font">Font Family</label>
            <select id="input-font" name="font-style" onchange="changeFont(this);">
                <option value="Times New Roman" <?php if ($fontStyle == "Times New Roman") echo "selected" ?>>Times New Roman</option>
                <option value="Arial" <?php if ($fontStyle == "Arial") echo "selected" ?>>Arial</option>
                <option value="Courier" <?php if ($fontStyle == "Courier") echo "selected" ?>>Courier</option>
            </select>
        </div>
        <div>
            <label for="input-size">Font Size</label>
            <input type="number" name="font-size" id="font-size" value="<?php echo $fontSize ?? 14 ?>" onchange="changeSize(this);">
        </div>
        <div>
            <label for="input-dir">Font Direction</label>
            <select id="input-dir" name="font-dir" onchange="changeDir(this);">
                <option value="ltr" <?php if ($fontDir == "ltr") echo "selected" ?>>LEFT TO RIGHT</option>
                <option value="rtl" <?php if ($fontDir == "rtl") echo "selected" ?>>RIGHT TO LEFT</option>
            </select>
        </div>
        <button type="submit">Change style</button>
    </form>


    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse doloremque dicta provident enim earum quibusdam iusto sit, ipsam, minima est fugit nisi eos illum quidem ducimus at itaque ab accusantium.</p>

    <script>
        const changeFont = function(font) {
            document.body.style.fontFamily = font.value;
        }
        const changeSize = function(font) {
            console.log(font.value)
            document.body.style.fontSize = font.value + "px";
        }
        const changeDir = function(font) {
            console.log(font.value)
            document.body.style.direction = font.value;
        }
    </script>
</body>

</html>