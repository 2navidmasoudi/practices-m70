<?php
session_start();
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login to Drive</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet">
</head>

<?php
include_once "../../public/error.php";

$error = $_COOKIE['error'] ?? '';
setcookie('error', null, time() - 1, '/');

$username = $_SESSION['username'] ?? '';
?>

<body class="text-center bg-dark-moon">

    <main class="form-signin">
        <form action="/public/login.php" method="post">
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
            <?php show_error($error); ?>
            <button class="w-100 btn btn-lg btn-success" type="submit">Login</button>
            <p class="mt-5 mb-3 text-muted">Not a user yet?
                <a href="/view/register/" class="link-info">Register</a>.
            </p>
        </form>
    </main>
</body>

</html>