<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/2.css">
</head>

<?php
// define variables and set to empty values
$err = [
    "firstname" => '',
    "lastname" => '',
    "fname" => '',
    "mellinumber" => '',
    "idnumber" => '',
    "education" => '',
    "job" => '',
    "phone" => '',
    "tel" => '',
    "address" => '',
    "email" => '',
    "security" => '',
];

$firstname = $lastname = $fname = $mellinumber = $idnumber = "";
$education = $job = $phone = $tel = $address = "";
$addressjob = $email = $security = "";

$success = null;
$persianPattern = "/^[آابپتثجچحخدذرزژسشصضطظعغفقکگلمنوهیئ]{2,}$/";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["firstname"])) {
        $err["firstname"] = "نام اجباری است";
    } else {
        $firstname = test_input($_POST["firstname"]);
        $err["firstname"] = "";
        // check if name only contains letters and whitespace
        if (!preg_match($persianPattern, $firstname)) {
            $err["firstname"] = "نام باید حروف فارسی و بیشتر از ۲ حرف باشد.";
        }
    }

    if (empty($_POST["lastname"])) {
        $err["lastname"] = "نام خانوادگی اجباری است";
    } else {
        $lastname = test_input($_POST["lastname"]);
        $err["lastname"] = "";
        // check if name only contains letters and whitespace
        if (!preg_match($persianPattern, $lastname)) {
            $err["lastname"] = "نام خانوادگی باید حروف فارسی و بیشتر از ۲ حرف باشد.";
        }
    }

    if (empty($_POST["fname"])) {
        $err["fname"] = "نام پدر اجباری است";
    } else {
        $fname = test_input($_POST["fname"]);
        $err["fname"] = "";
        // check if name only contains letters and whitespace
        if (!preg_match($persianPattern, $fname)) {
            $err["fname"] = "نام پدر باید حروف فارسی و بیشتر از ۲ حرف باشد.";
        }
    }

    if (empty($_POST["idnumber"])) {
        $err["idnumber"] = "شماره شناسنامه اجباری است";
    } else {
        $err["idnumber"] = "";
        $idnumber = test_input($_POST["idnumber"]);
        if (!preg_match("/^([1-9]\d{3}|00\d{8}|[1-9]\d{7}|\+98\d{11})$/", $idnumber)) {
            $err["idnumber"] = "شماره شناسنامه معتبر نمیباشد.";
        }
    }

    if (empty($_POST["mellinumber"])) {
        $err["mellinumber"] = "شماره ملی اجباری است است";
    } else {
        $err["mellinumber"] = "";
        $mellinumber = test_input($_POST["mellinumber"]);
        if (!preg_match("/^\d+$/", $mellinumber)) {
            $err["mellinumber"] = "شماره ملی معتبر نمیباشد.";
        }
    }

    if (empty($_POST["education"])) {
        $err["education"] = "وضعیت تحصیلی اجباری است";
    } else {
        $err["education"] = "";
        $education = test_input($_POST["education"]);
    }
    if (empty($_POST["job"])) {
        $err["job"] = "وضعیت تحصیلی اجباری است";
    } else {
        $err["job"] = "";
        $job = test_input($_POST["job"]);
    }
    if (empty($_POST["address"])) {
        $err["address"] = "آدرس محل سکونت اجباری است";
    } else {
        $err["address"] = "";
        $address = test_input($_POST["address"]);
    }
    $addressjob = test_input($_POST["addressjob"]);

    if (empty($_POST["phone"])) {
        $err["phone"] = "موبایل اجباری است";
    } else {
        $err["phone"] = "";
        $phone = test_input($_POST["phone"]);
        if (!preg_match("/^(\+98\d{11}|09\d{9})$/", $phone)) {
            $err["phone"] = "موبایل معتبر نمیباشد.";
        }
    }

    $err["tel"] = "";
    $tel = test_input($_POST["tel"]);
    if (!preg_match("/^\d{11}$/", $tel) && !empty($tel)) {
        $err["tel"] = "تلفن ثابت معتبر نمیباشد.";
    }

    if (empty($_POST["email"])) {
        $err["email"] = "ایمیل اجباریست.";
    } else {
        $err["email"] = "";
        $email = test_input($_POST["email"]);
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $err["email"] = "ایمیل معتبر نمی باشد.";
        }
    }


    $err["security"] = "";
    $security = test_input($_POST["security"]);
    if (!preg_match("/^jeci9i$/", strtolower($security))) {
        $err["security"] = "کد امنیتی اشتباه است.";
    }

    if (count(array_unique($err)) === 1) {
        // all values in $err are the same
        $success = true;
    } else {
        $success = false;
    }
}

function test_input($data)
{
    // $data = trim($data);
    // $data = stripslashes($data);
    // $data = htmlspecialchars($data);
    return $data;
}
?>

<body dir="rtl">
    <?php
    if ($success === true) { ?>
        <div class="status">
            <p class="success">اطلاعات با موفقیت ثبت شد.</p>
        </div>
    <?php } elseif ($success === false) { ?>
        <div class="status">
            <p class="error">خطا در ارسال اطلاعات</p>
        </div>
    <?php }
    echo "<ul>";
    foreach ($err as $message) {
        if (!empty($message)) {
            echo "<li>";
            echo "<span>$message</span><br>";
            echo "</li>";
        }
    }
    echo "</ul>";
    ?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="row">
            <div class="input-container">
                <label for="firsname">نام<span>*</span></label>
                <input type="text" name="firstname" id="firstname" value="<?php echo $firstname; ?>">
            </div>
            <div class="input-container">
                <label for="lastname">نام خانوادگی<span>*</span></label>
                <input type="text" name="lastname" id="lastname" value="<?php echo $lastname; ?>">
            </div>
            <div class="input-container">
                <label for="fname">نام پدر<span>*</span></label>
                <input type="text" name="fname" id="fname" value="<?php echo $fname; ?>">
            </div>
        </div>
        <div class="row">
            <div class="input-container">
                <label for="idnumber">شماره شناسنامه<span>*</span></label>
                <input type="text" name="idnumber" id="idnumber" value="<?php echo $idnumber; ?>">
            </div>
            <div class="input-container">
                <label for="mellinumber">شماره ملی<span>*</span></label>
                <input type="text" name="mellinumber" id="mellinumber" value="<?php echo $mellinumber; ?>">
            </div>
        </div>
        <div class="row">
            <div class="input-container">
                <label for="education">وضعیت تحصیلی<span>*</span></label>
                <div class="radio">
                    دانشجو کارشناسی
                    <input type="radio" name="education" id="education" value="1" <?php if (isset($education) && $education == "1") echo "checked"; ?>>
                </div>
                <div class="radio">
                    دانش آموخته کارشناسی
                    <input type="radio" name="education" id="education" value="2" <?php if (isset($education) && $education == "2") echo "checked"; ?>>
                </div>
                <div class="radio">
                    دانشجو کارشناسی ارشد
                    <input type="radio" name="education" id="education" value="3" <?php if (isset($education) && $education == "3") echo "checked"; ?>>
                </div>

                <div class="radio">
                    دانش آموخته کارشناسی ارشد
                    <input type="radio" name="education" id="education" value="4" <?php if (isset($education) && $education == "4") echo "checked"; ?>>
                </div>
                <div class="radio">
                    دانشجو دکترا
                    <input type="radio" name="education" id="education" value="5" <?php if (isset($education) && $education == "5") echo "checked"; ?>>
                </div>
                <div class="radio">
                    دانش آموخته دکترا
                    <input type="radio" name="education" id="education" value="6" <?php if (isset($education) && $education == "6") echo "checked"; ?>>
                </div>
            </div>
            <div class="input-container">
                <label for="job">شغل<span>*</span></label>
                <div class="radio">
                    دانشجو
                    <input type="radio" name="job" id="job" value="1" <?php if (isset($job) && $job == "1") echo "checked"; ?>>
                </div>
                <div class="radio">
                    دبیر
                    <input type="radio" name="job" id="job" value="2" <?php if (isset($job) && $job == "2") echo "checked"; ?>>
                </div>
                <div class="radio">
                    استاد
                    <input type="radio" name="job" id="job" value="3" <?php if (isset($job) && $job == "3") echo "checked"; ?>>
                </div>
                <div class="radio">
                    شاغل بخش دولتی
                    <input type="radio" name="job" id="job" value="4" <?php if (isset($job) && $job == "4") echo "checked"; ?>>
                </div>
                <div class="radio">
                    شاغل بخش خصوصی
                    <input type="radio" name="job" id="job" value="5" <?php if (isset($job) && $job == "5") echo "checked"; ?>>
                </div>
                <div class="radio">
                    بازنشسته
                    <input type="radio" name="job" id="job" value="6" <?php if (isset($job) && $job == "6") echo "checked"; ?>>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="input-container">
                <label for="address">نشانی محل سکونت<span>*</span></label>
                <input type="text" name="address" id="address" value="<?php echo $address; ?>">
            </div>
            <div class="input-container">
                <label for="addressjob">نشانی محل کار</label>
                <input type="text" name="addressjob" id="addressjob" value="<?php echo $addressjob; ?>">
            </div>
        </div>
        <div class="row">
            <div class="input-container">
                <label for="phone">تلفن همراه<span>*</span></label>
                <input type="tel" name="phone" id="phone" value="<?php echo $phone; ?>">
            </div>
            <div class="input-container">
                <label for="tel">تلفن ثابت</label>
                <input type="tel" name="tel" id="tel" value="<?php echo $tel; ?>">
            </div>
        </div>
        <div class="row">
            <div class="input-container">
                <label for="email">نشانی پست الکترونیکی<span>*</span></label>
                <input type="email" name="email" id="email" value="<?php echo $email; ?>">
            </div>
        </div>
        <div class="security-container">
            <label for="security" class="security">کد امنیتی<img src="./assets/security.png" alt=""></label>
            <input type="text" name="security" id="security" value="<?php echo $security; ?>">
        </div>
        <input type="submit" value="ثبت فرم" name="submit">
    </form>
</body>

</html>