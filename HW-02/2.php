<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/2.css">
</head>

<body dir="rtl">
    <div class="row">
        <div class="input-container">
            <label for="firsname">نام<span>*</span></label>
            <input type="text" name="firstname" id="firstname" value="">
        </div>
        <div class="input-container">
            <label for="lastname">نام خانوادگی<span>*</span></label>
            <input type="text" name="lastname" id="lastname" value="">
        </div>
        <div class="input-container">
            <label for="fname">نام پدر<span>*</span></label>
            <input type="text" name="fname" id="fname" value="">
        </div>
    </div>
    <div class="row">
        <div class="input-container">
            <label for="idnumber">شماره شناسنامه<span>*</span></label>
            <input type="text" name="idnumber" id="idnumber" value="">
        </div>
        <div class="input-container">
            <label for="lastname">شماره ملی<span>*</span></label>
            <input type="text" name="lastname" id="lastname" value="">
        </div>
    </div>
    <div class="row">
        <div class="input-container">
            <label for="education">وضعیت تحصیلی<span>*</span></label>
            <div class="radio">
                دانشجو کارشناسی
                <input type="radio" name="education" id="education" value="1">
            </div>
            <div class="radio">
                دانش آموخته کارشناسی
                <input type="radio" name="education" id="education" value="2">
            </div>
            <div class="radio">
                دانشجو کارشناسی ارشد
                <input type="radio" name="education" id="education" value="3">
            </div>

            <div class="radio">
                دانش آموخته کارشناسی ارشد
                <input type="radio" name="education" id="education" value="4">
            </div>
            <div class="radio">
                دانشجو دکترا
                <input type="radio" name="education" id="education" value="5">
            </div>
            <div class="radio">
                دانش آموخته دکترا
                <input type="radio" name="education" id="education" value="6">
            </div>
        </div>
        <div class="input-container">
            <label for="job">شغل<span>*</span></label>
            <div class="radio">
                دانشجو
                <input type="radio" name="job" id="job" value="1">
            </div>
            <div class="radio">
                دبیر
                <input type="radio" name="job" id="job" value="2">
            </div>
            <div class="radio">
                استاد
                <input type="radio" name="job" id="job" value="3">
            </div>
            <div class="radio">
                شاغل بخش دولتی
                <input type="radio" name="job" id="job" value="4">
            </div>
            <div class="radio">
                شاغل بخش خصوصی
                <input type="radio" name="job" id="job" value="5">
            </div>
            <div class="radio">
                بازنشسته
                <input type="radio" name="job" id="job" value="6">
            </div>
        </div>

    </div>
    <div class="row">
        <div class="input-container">
            <label for="address">نشانی محل سکونت<span>*</span></label>
            <input type="text" name="address" id="address" value="">
        </div>
        <div class="input-container">
            <label for="addressjob">نشانی محل کار</label>
            <input type="text" name="addressjob" id="addressjob" value="">
        </div>
    </div>
    <div class="row">
        <div class="input-container">
            <label for="phone">تلفن همراه<span>*</span></label>
            <input type="tel" name="phone" id="phone" value="">
        </div>
        <div class="input-container">
            <label for="tel">تلفن ثابت</label>
            <input type="tel" name="tel" id="tel" value="">
        </div>
    </div>
    <div class="row">
        <div class="input-container">
            <label for="idnumber">نشانی پست الکترونیکی<span>*</span></label>
            <input type="text" name="idnumber" id="idnumber" value="">
        </div>
    </div>
    <div class="security-container">
        <label for="security" class="security">کد امنیتی<img src="./assets/security.png" alt=""></label>
        <input type="text" name="security" id="security" value="">
    </div>
    <input type="button" value="ثبت فرم" name="submit" id="submit">
</body>

</html>