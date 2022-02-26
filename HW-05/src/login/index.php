<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Signin Template · Bootstrap v5.1</title>


    <!-- Bootstrap core CSS -->
    <link href="/assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="style.css" rel="stylesheet">
</head>
<?php

$error = $_GET['error'] ?? '';
$username = $_GET['username'] ?? '';

include $_SERVER['DOCUMENT_ROOT'] . "/php/error/show.php";
?>

<body class="text-center bg-dark">

    <main class="form-signin">
        <form action="/php/login.php" method="post">
            <!-- <img class="mb-4" src="/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> -->
            <h1 class="h3 mb-3 fw-normal text-light">Please login</h1>

            <div class="form-floating">
                <input type="text" class="form-control 
                <?php if ($username) {
                    echo 'is-valid';
                } elseif ($error == 1) {
                    echo 'is-invalid';
                } ?>" id="floatingInput" placeholder="Username" name="username" value="<?php echo $username ?>">
                <label for="floatingInput">Username</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control 
                <?php if ($error == 1) echo 'is-invalid'; ?>" id="floatingPassword" placeholder="Password" name="password">
                <label for="floatingPassword">Password</label>
            </div>
            <?php showError($error); ?>
            <button class="w-100 btn btn-lg btn-success" type="submit">Login</button>
            <p class="mt-5 mb-3 text-muted">Not a user yet?
                <a href="/src/register/" class="link-info">Register</a>.
            </p>
        </form>
    </main>
</body>

</html>