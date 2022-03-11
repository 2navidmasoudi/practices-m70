<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register to Drive</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet">
</head>

<?php
include_once "../../public/error.php";

$error = $_COOKIE['error'] ?? '';
setcookie('error', null, time() - 1, '/');

$username = $_SESSION['username'] ?? '';
$name = $_SESSION['name'] ?? '';
$email = $_SESSION['email'] ?? '';
?>

<body class="text-center bg-dark-moon">

    <main class="form-signin">
        <form action="/public/register.php" method="post">
            <h1 class="h3 mb-3 fw-normal text-light">Please register</h1>

            <div class="form-floating">
                <input type="text" class="form-control 
                <?php if ($error == 1 or $error == 2) {
                    echo 'is-invalid';
                } elseif ($username) {
                    echo 'is-valid';
                } ?>" id="floatingUsername" placeholder="Username" name="username" value="<?php echo $username ?>">
                <label for="floatingUsername">Username</label>
            </div>
            <div class="form-floating">
                <input type="email" class="form-control 
                <?php if ($email) {
                    echo 'is-valid';
                } elseif ($error == 1) {
                    echo 'is-invalid';
                } ?>" id="floatingEmail" placeholder="email" name="email" value="<?php echo $email ?>">
                <label for="floatingEmail">Email</label>
            </div>
            <div class="form-floating">
                <input type="text" class="form-control  
                <?php if ($error == 1 or $error == 3) {
                    echo 'is-invalid';
                } elseif ($name) {
                    echo 'is-valid';
                } ?>" id="floatingName" placeholder="name" name="name" value="<?php echo $name ?>">
                <label for="floatingName">Name</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control <?php if ($error == 1 or $error == 4) echo 'is-invalid'; ?>" id="floatingPassword" placeholder="password" name="password">
                <label for="floatingPassword">Password</label>
            </div>
            <?php show_error($error); ?>
            <button class="w-100 btn btn-lg btn-success" type="submit">Register</button>
            <p class="mt-5 mb-3 text-muted">Already a user?
                <a href="/view/login/" class="link-info">Login</a>.
            </p>
        </form>
    </main>

</body>

</html>