<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <title>upload file</title>
</head>

<?php

if (isset($_POST['submit'])) {
    $ext = "." . pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
    move_uploaded_file($_FILES['file']['tmp_name'], $_POST['name'] . $ext);
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
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>