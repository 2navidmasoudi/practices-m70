<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="">
        <label for="Username">Username: </label>
        <input type="text" name="Username" pattern="[A-Z][a-z]+">
        <br>
        <label for="Email">Email: </label>
        <input type="email" name="Email" pattern="\w+@\w+\.\w+">
        <br>
        <label for="Phone">Phone: </label>
        <input type="phone" name="Phone" pattern="(?:\+98|0)9\d{9}">
        <br>
        <label for="Password">Password</label>
        <input type="password" name="Password" pattern="^(?=.*[A-Z])\w{8,}$">
        <br>
        <input type="submit" value="Submit">
    </form>
</body>

</html>