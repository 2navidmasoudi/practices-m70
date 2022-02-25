<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <title>upload file</title>
</head>

<?php

$uploadOk = null;
$error = null;

$text_dir = "./text";
$images_dir = "./images";

function rand_str($n)
{
    // $num = range(0, 9);
    $str = [...range('a', 'z'), ...range('A', 'Z'), ...range(0, 9)];
    $rand_text = "";
    for ($i = 0; $i < $n; $i++) {
        // $rand_text .= $num[rand(0, 9)];
        $rand_text .= $str[rand(0, count($str))];
    }
    return $rand_text;
}

rand_str(10);

if (isset($_POST['submit'])) {
    $ext = "." . pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);

    if (getimagesize($_FILES["file"]["tmp_name"]) !== false) {
        // Image
        $dir = $images_dir;

        if ($_FILES["file"]["size"] > 1024 * 1024) {
            $error = "Sorry, your image is more than 1mb.";
            $uploadOk = 0;
        }
        if (!file_exists($dir)) {
            mkdir($dir);
        }
        $file_path = $dir . "/" . rand_str(6) . "_" . $_POST['name'] . $ext;
        if (file_exists($file_path)) {
            $error = "File is already uploaded";
            $uploadOk = 0;
        } elseif (move_uploaded_file($_FILES['file']['tmp_name'], $file_path)) {
            $uploadOk = 1;
        }
    } elseif (str_contains($_FILES['file']['type'], 'text')) {
        // Text
        $dir = $text_dir;

        if ($_FILES["file"]["size"] > 1024 * 512) {
            $error = "Sorry, your text is more than 512kb.";
            $uploadOk = 0;
        }
        if (!file_exists($dir)) {
            mkdir($dir);
        }
        $file_path = $dir . "/" . rand_str(6) . "_" . $_POST['name'] . $ext;
        if (file_exists($file_path)) {
            $error = "File is already uploaded";
            $uploadOk = 0;
        } elseif (move_uploaded_file($_FILES['file']['tmp_name'], $file_path)) {
            $uploadOk = 1;
        }
    } else {
        // not text and image
        $error = "File is not an image or text.";
        $uploadOk = 0;
    }
}


?>

<body>
    <div class="container mt-4">
        <form method="post" action="" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Name of file: </label>
                <input type="text" class="form-control" id="name" name="name" placeholder="file name">
            </div>
            <div class="form-group">
                <label for="name">Choose your file:</label>
                <input type="file" class="form-control" id="name" name="file">
            </div>
            <div class="form-group">
                <label for="detail">About file:</label>
                <textarea class="form-control" id="detail" name="detail" rows="3" placeholder="Details about file..."></textarea>
            </div>
            <button type="submit" class="btn btn-success mt-3" name="submit">Upload</button>
        </form>
        <?php if (isset($error)) { ?>
            <div class="border border-danger rounded text-danger mt-3 p-3">
                <?php echo $error ?>
            </div>
        <?php } ?>
        <?php if ($uploadOk) { ?>
            <div class="border border-success rounded text-success mt-3 p-3">
                <?php echo "file upload successful." ?>
            </div>
        <?php } ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>