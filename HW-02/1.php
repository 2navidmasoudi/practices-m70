<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/1.css">
    <title>Form</title>
</head>
<?php
$file = file_get_contents("./data/countries.json");
$countries = json_decode($file, true);

$name = $_POST["name"] ?? null;
$address = $_POST["address"] ?? null;
$zipcode = $_POST["zipcode"] ?? null;
$country = $_POST["country"] ?? null;
$gender = $_POST["gender"] ?? null;
$preference = $_POST["preference"] ?? null;
$preferences = $_POST["preferences"] ?? null;
$phone = $_POST["phone"] ?? null;
$email = $_POST["email"] ?? null;
$password = $_POST["password"] ?? null;
$verify_password = $_POST["verify_password"] ?? null;

$error = [
    "name" => false,
    "zipcode" => false,
    "country" => false,
    "gender" => false,
    "preferences" => false,
    "phone" => false,
    "email" => false,
    "password" => false,
    "verify_password" => false,
];

$default = $error;
$success = null;

if (isset($_POST['submit'])) {
    if (!$name) $error['name'] = true;
    if (!$zipcode) $error['zipcode'] = true;
    if (!$country) $error['country'] = true;
    if (!$gender) $error['gender'] = true;
    if (!$preferences) $error['preferences'] = true;
    if (!$phone) $error['phone'] = true;
    if (!$email) $error['email'] = true;
    if (!$password) $error['password'] = true;
    if ($verify_password != $password) $error['verify_password'] = true;

    if (in_array(true, $error)) {
        $success = false;
    } else {
        $success = true;
    }
}

// reset errors
if (isset($_POST['submitreset'])) {
    $error = $default;
}

?>

<body>
    <h1>Test Form Validation</h1>
    <?php
    if ($success === true) { ?>
        <div class="status">
            <p class="success">Success in sending data</p>
        </div>
    <?php } elseif ($success === false) { ?>
        <div class="status">
            <p class="error">Error sending data</p>
        </div>
    <?php } ?>
    <form action="" method="post">
        <div class="container">
            <label for="name">Name<span>*</span></label>
            <div class="input-container">
                <input type="text" id="name" name="name" pattern="\[a-zA-Z]{6,}" title="Atleast 6 charecters.">

            </div>
            <?php if ($error["name"]) { ?>
                <span class="error-text">Please enter your name!</span>
            <?php } ?>
        </div>
        <div class="container">
            <label for="address">Address</label>
            <div class="input-container">
                <input type="text" id="address" name="address">
            </div>
        </div>
        <div class="container">
            <label for="zipcode">Zip Code<span>*</span></label>
            <div class="input-container">
                <input type="number" id="zipcode" name="zipcode">

            </div>
            <?php if ($error["zipcode"]) { ?>
                <span class="error-text">Please enter zip code!</span>
            <?php } ?>
        </div>
        <div class="container">
            <label for="country">Country<span>*</span></label>
            <div class="input-container">
                <select name="country" id="country">
                    <option value="">Please select...</option>
                    <?php
                    foreach ($countries as $value) {
                        $country = $value['country'];
                        $abbr = $value['abbreviation'];
                        echo "<option value='$abbr'>$country</option>";
                    }
                    ?>
                </select>

            </div>
            <?php if ($error["country"]) { ?>
                <span class="error-text">Please select your country!</span>
            <?php } ?>
        </div>
        <div class="container">
            <label for="gender">Gender<span>*</span></label>
            <div class="input-container">
                <input type="radio" name="gender" value="male">Male
                <input type="radio" name="gender" value="female">Female

            </div>
            <?php if ($error["gender"]) { ?>
                <span class="error-text">Please select your gender!</span>
            <?php } ?>
        </div>
        <div class="container">
            <label for="preferences">Preferences<span>*</span></label>
            <div class="input-container">
                <input type="checkbox" name="preferences" value="red">Red
                <input type="checkbox" name="preferences" value="green">Green
                <input type="checkbox" name="preferences" value="blue">Blue

            </div>
            <?php if ($error["preferences"]) { ?>
                <span class="error-text">Please select your preferences!</span>
            <?php } ?>
        </div>
        <div class="container">
            <label for="phone">Phone<span>*</span></label>
            <div class="input-container">
                <input type="tel" id="phone" name="phone" pattern="09\d{9,}" title="Start with 09, atleast 11 numbers">
            </div>
            <?php if ($error["phone"]) { ?>
                <span class="error-text">Please enter your phone!</span>
            <?php } ?>
        </div>
        <div class="container">
            <label for="email">Email<span>*</span></label>
            <div class="input-container">
                <input type="email" id="email" name="email" title="Enter a correct Email">
            </div>
            <?php if ($error["email"]) { ?>
                <span class="error-text">Please enter your email!</span>
            <?php } ?>
        </div>
        <div class="container">
            <label for="password">Password (6-8 charecters)<span>*</span></label>
            <div class="input-container">
                <input type="password" id="password" name="password" title="Enter a correct password" pattern="\w{6,8}">
            </div>
            <?php if ($error["password"]) { ?>
                <span class="error-text">Please enter your password!</span>
            <?php } ?>
        </div>
        <div class="container">
            <label for="verify">Verify Password<span>*</span></label>
            <div class="input-container">
                <input type="password" id="verify" name="verify_password" title="Enter a correct password" pattern="\w{6,8}">
            </div>

            <?php if ($error["verify_password"]) { ?>
                <span class="error-text">Your password does not match!</span>
            <?php } ?>
        </div>
        <div class=" container">
            <div class="input-container">
                <input type="submit" name="submit" value="SEND">
                <input type="reset" value="CLEAR" onclick="document.getElementById('resetButton').click()">
                <input name="submitreset" type="submit" id="resetButton" value="Reset" hidden>
            </div>
        </div>
    </form>
</body>

</html>