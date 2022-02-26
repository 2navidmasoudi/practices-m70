<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register to Drive</title>
    <link href="/assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
</head>

<?php
$error = $_GET['error'] ?? '';
$username = $_GET['username'] ?? '';
include $_SERVER['DOCUMENT_ROOT'] . "/php/error/show.php";
?>

<body class="text-center bg-dark">

    <main class="form-signin">
        <form action="/php/register.php" method="post">
            <h1 class="h3 mb-3 fw-normal text-light">Please register</h1>

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
                <input type="password" class="form-control <?php if ($error == 1 or $error == 2) echo 'is-invalid'; ?>" id="floatingPassword" placeholder="Password" name="password">
                <label for="floatingPassword">Password</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control <?php if ($error == 1 or $error == 2) echo 'is-invalid'; ?>" id="floatingConfirm" placeholder="Confirm Password" name="confirm">
                <label for="floatingConfirm">Confirm Password</label>
            </div>
            <?php showError($error); ?>
            <button class="w-100 btn btn-lg btn-success" type="submit">Register</button>
            <p class="mt-5 mb-3 text-muted">Already a user?
                <a href="/src/login/" class="link-info">Login</a>.
            </p>
        </form>
    </main>



</body>

</html>