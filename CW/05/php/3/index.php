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

$text_path = "./text";
$images_path = "./images";

if (isset($_POST['submit'])) {
    $ext = "." . pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
    if (str_contains($_FILES['file']['type'], 'image')) {
        if ($_FILES["file"]["size"] > 1024 * 1024) {
            $error = "Sorry, your image is more than 1mb.";
            $uploadOk = 0;
        }
        if (!file_exists($images_path)) {
            mkdir($images_path);
        }
        $file_path = $images_path . "/" . $_POST['name'] . $ext;
        if (move_uploaded_file($_FILES['file']['tmp_name'], $file_path)) {
            $uploadOk = 1;
        }
    } elseif (str_contains($_FILES['file']['type'], 'text')) {
        if ($_FILES["file"]["size"] > 1024 * 512) {
            $error = "Sorry, your text is more than 512kb.";
            $uploadOk = 0;
        }
        if (!file_exists($text_path)) {
            mkdir($text_path);
        }
        $file_path = $text_path . "/" . $_POST['name'] . $ext;
        if (move_uploaded_file($_FILES['file']['tmp_name'], $file_path)) {
            $uploadOk = 1;
        }
    } else {
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