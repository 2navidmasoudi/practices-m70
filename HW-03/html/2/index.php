<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ارتباط با ما - بوتکمپ برنامه نوسی مکتب شریف</title>
    <link rel="stylesheet" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="style.css" />
</head>

<?php

$success = false;

if (isset($_POST["submit"])) {
    $success = true;
}

?>

<body dir="rtl">
    <header class="w-full fixed top-0 z-50">
        <div class="header py-4 flex items-center justify-between px-[48px] transition-all duration-500 ease-in-out">
            <div class="flex items-center justify-start">
                <a class="w-[54px] h-[60px] flex items-center flex-shrink-0 ml-[48px]" href="/"><img alt="MaktabSharif_logo" src="assets/img/logo.png" /></a>
                <div class="gap-4 items-center hidden lg:flex">
                    <a class="text-white opacity-50 font-medium hover:opacity-100 transition-all duration-500 ease-in-out" href="/">مکتب را خوب بشناسیم</a>
                    <a class="text-white opacity-50 font-medium hover:opacity-100 transition-all duration-500 ease-in-out" href="/">بوت‌کمپ‌ها</a>
                    <a class="text-white opacity-50 font-medium hover:opacity-100 transition-all duration-500 ease-in-out" href="/">کاروندان</a>
                    <a class="text-white opacity-50 font-medium hover:opacity-100 transition-all duration-500 ease-in-out" href="/">تیم مکتب</a>
                    <a class="text-white opacity-50 font-medium hover:opacity-100 transition-all duration-500 ease-in-out" href="/">ارتباط با ما</a>
                    <a class="text-white opacity-50 font-medium hover:opacity-100 transition-all duration-500 ease-in-out" href="/">سوالات متداول</a>
                    <a class="text-white opacity-50 font-medium hover:opacity-100 transition-all duration-500 ease-in-out" href="https://blog.maktabsharif.ir/">وبلاگ</a>
                </div>
            </div>
            <svg class="lg:hidden h-8 w-8 text-white opacity-50 hover:opacity-100 transition-all duration-500 ease-in-out cursor-pointer" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                </path>
            </svg>
        </div>
    </header>
    <main>
        <div>
            <div class="bg-gradient-to-bl from-[#6FCAC3] to-[#7C70B2] flex flex-col items-center justify-center pt-36 pb-16 text-white">
                <h1 class="text-3xl font-semibold">ارتباط با ما</h1>
            </div>
            <div class="container py-10">

                <?php if ($success) { ?>
                    <div class="bg-green-500 p-4 rounded mt-4">
                        <h3 class="text-2xl font-bold text-white">مشخصات شما با موفقیت ارسال شد.</h3>
                    </div>
                <?php } ?>

                <form class="flex flex-col items-center sm:items-end mt-6" method="POST" action="">
                    <div class="w-full grid grid-cols-1 md:grid-cols-2 gap-x-2 gap-y-4">
                        <div>
                            <label class="block" for="first-name">نام *</label>
                            <input class="mt-2 rounded outline-none border-gray-300 h-10 w-full form-input" id="first-name" type="text" required name="firstname" value="<?php echo $_POST['firstname'] ?>" />
                        </div>
                        <div>
                            <label class="block" for="last-name">نام خانوادگی *</label>
                            <input class="mt-2 rounded outline-none border-gray-300 h-10 w-full form-input" id="last-name" type="text" required name="lastname" value="<?php echo $_POST['lastname'] ?>" />
                        </div>
                        <div>
                            <label class="block" for="phone-number">شماره تماس *</label>
                            <input class="mt-2 rounded outline-none border-gray-300 h-10 w-full form-input" id="phone-number" type="tel" placeholder="09123456789" required name="phone" value="<?php echo $_POST['phone'] ?>" />
                        </div>
                        <div>
                            <label class="block" for="email">ایمیل *</label>
                            <input class="mt-2 rounded outline-none border-gray-300 h-10 w-full form-input" id="email" type="email" required name="email" value="<?php echo $_POST['email'] ?>" />
                        </div>
                        <div class="md:col-span-2">
                            <label class="block" for="subject">موضوع *</label>
                            <select class="mt-2 rounded outline-none border-gray-300 h-10 w-full form-input" id="subject" required name="subject">
                                <option selected disabled value="">
                                    لطفا موضوع پیام خود را انتخاب کنید ...
                                </option>
                                <option value="companies">شرکت‌ها - درخواست جذب نیرو</option>
                                <option value="teacher">مدرس - درخواست همکاری</option>
                                <option value="other">سایر</option>
                            </select>
                        </div>
                        <div class="md:col-span-2">
                            <label for="text" class="block">پیام *</label>
                            <textarea class="mt-2 rounded outline-none border-gray-300 w-full form-textarea" name="text" id="text" required rows="4"><?php echo $_POST['text'] ?></textarea>
                        </div>
                    </div>
                    <button class="justify-center items-center flex px-8 py-2 rounded-3xl font-medium transition-all ease-linear from-[#F97111] to-[#FFAB0B] bg-gradient-to-l text-white mt-4" type="submit" name="submit">
                        ثبت درخواست
                    </button>
                </form>
            </div>
        </div>
    </main>
    <footer class="pt-2 bg-gradient-to-bl from-[#6FCAC3] to-[#7C70B2]">
        <div class="container">
            <div class="flex mt-14 flex-col md:flex-row gap-x-4">
                <div class="w-full md:w-1/2">
                    <div class="logo mb-3" role="banner">
                        <img class="img-fluid" width="64" src="assets/img/logo.png" alt="آرم مکتب‌شریف" />
                    </div>
                    <div class="m-0 mb-4 p-0 text-white">
                        <p class="opacity-80">
                            خیابان آزادی، بعد از دانشگاه شریف، نرسیده به میدان آزادی، کوچه
                            آران، پلاک 11، واحد 7
                        </p>
                        <p class="opacity-80">کد پستی: 1458844800</p>
                        <p class="mb-1 mt-4 opacity-80">ساعات پاسخگویی 9 الی 18</p>
                        <br />
                        <a href="tel:+982191077225" class="mb-0 text-white opacity-80 hover:opacity-100 transition-all duration-300 ease-linear">021-91077225</a>
                        <br />
                        <a href="mailto:apply@maktabsharif.ir" class="mb-0 text-white opacity-80 hover:opacity-100 transition-all duration-300 ease-linear">apply@maktabsharif.ir</a>
                    </div>
                    <ul class="flex text-white m-0 p-0 gap-4">
                        <li class="opacity-60 hover:opacity-100 transition-all ease-linear duration-300">
                            <a href="https://www.instagram.com/maktab_sharif" rel="me nofollow" target="_blank"><svg class="svg-inline--fa fa-instagram w-6" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="instagram" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                    <path fill="currentColor" d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z">
                                    </path>
                                </svg></a>
                        </li>
                        <li class="opacity-60 hover:opacity-100 transition-all ease-linear duration-300">
                            <a href="https://t.me/maktab_sharif" rel="me nofollow" target="_blank"><svg class="svg-inline--fa fa-telegram-plane w-6" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="telegram-plane" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                    <path fill="currentColor" d="M446.7 98.6l-67.6 318.8c-5.1 22.5-18.4 28.1-37.3 17.5l-103-75.9-49.7 47.8c-5.5 5.5-10.1 10.1-20.7 10.1l7.4-104.9 190.9-172.5c8.3-7.4-1.8-11.5-12.9-4.1L117.8 284 16.2 252.2c-22.1-6.9-22.5-22.1 4.6-32.7L418.2 66.4c18.4-6.9 34.5 4.1 28.5 32.2z">
                                    </path>
                                </svg></a>
                        </li>
                        <li class="opacity-60 hover:opacity-100 transition-all ease-linear duration-300">
                            <a href="https://www.linkedin.com/company/maktabsharif/" rel="me nofollow" target="_blank"><svg class="svg-inline--fa fa-linkedin-in w-6" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="linkedin-in" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                    <path fill="currentColor" d="M100.28 448H7.4V148.9h92.88zM53.79 108.1C24.09 108.1 0 83.5 0 53.8a53.79 53.79 0 0 1 107.58 0c0 29.7-24.1 54.3-53.79 54.3zM447.9 448h-92.68V302.4c0-34.7-.7-79.2-48.29-79.2-48.29 0-55.69 37.7-55.69 76.7V448h-92.78V148.9h89.08v40.8h1.3c12.4-23.5 42.69-48.3 87.88-48.3 94 0 111.28 61.9 111.28 142.3V448z">
                                    </path>
                                </svg></a>
                        </li>
                        <li class="opacity-60 hover:opacity-100 transition-all ease-linear duration-300">
                            <a href="https://twitter.com/maktab_sharif" rel="me nofollow" target="_blank"><svg class="svg-inline--fa fa-twitter w-6" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="twitter" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                    <path fill="currentColor" d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z">
                                    </path>
                                </svg></a>
                        </li>
                    </ul>
                </div>
                <div class="w-full md:w-1/6">
                    <a referrerpolicy="origin" target="_blank" href="">
                        <img referrerpolicy="origin" src="assets/img/enamad.png" alt="" style="cursor: pointer" />
                    </a>
                    <img referrerpolicy="origin" alt="logo-samandehi" src="assets/img/samandehi.png" style="cursor: pointer" />
                </div>
            </div>
            <hr class="mt-12 mb-5 text-white text-sm" />
            <p class="copyright text-sm text-white flex justify-center mb-0 pb-3 opacity-80">
                <svg class="svg-inline--fa fa-copyright w-4 mx-1" aria-hidden="true" focusable="false" data-prefix="far" data-icon="copyright" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                    <path fill="currentColor" d="M256 8C119.033 8 8 119.033 8 256s111.033 248 248 248 248-111.033 248-248S392.967 8 256 8zm0 448c-110.532 0-200-89.451-200-200 0-110.531 89.451-200 200-200 110.532 0 200 89.451 200 200 0 110.532-89.451 200-200 200zm107.351-101.064c-9.614 9.712-45.53 41.396-104.065 41.396-82.43 0-140.484-61.425-140.484-141.567 0-79.152 60.275-139.401 139.762-139.401 55.531 0 88.738 26.62 97.593 34.779a11.965 11.965 0 0 1 1.936 15.322l-18.155 28.113c-3.841 5.95-11.966 7.282-17.499 2.921-8.595-6.776-31.814-22.538-61.708-22.538-48.303 0-77.916 35.33-77.916 80.082 0 41.589 26.888 83.692 78.277 83.692 32.657 0 56.843-19.039 65.726-27.225 5.27-4.857 13.596-4.039 17.82 1.738l19.865 27.17a11.947 11.947 0 0 1-1.152 15.518z">
                    </path>
                </svg>
                کلیه حقوق این سایت متعلق به شرکت توسعه و توانمندسازی مکتب‌ شریف است.
            </p>
        </div>
    </footer>
</body>

</html>