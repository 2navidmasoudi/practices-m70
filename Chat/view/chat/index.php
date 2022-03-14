<?php
session_start();

if (!isset($_SESSION['user']['username'])) {
    session_destroy();
    header('location: /index.php');
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Chat</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="output.css" rel="stylesheet">
</head>

<?php
$user = $_SESSION['user'];
?>

<body>
    <main class="flex h-screen">
        <!-- about me section -->
        <section class="flex-1 bg-black">

        </section>

        <!-- general chat section -->
        <section class="flex-[2] bg-green-600">

        </section>

        <!-- users section -->
        <section class="flex-1 bg-red-600">

        </section>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </main>
</body>

</html>