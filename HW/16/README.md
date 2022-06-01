# 1. Explain about laravel and directories:

لاراول یک full-stack framework هست که میشه باهاش هم سرویس back-end مانند API پیاده سازی کرد و هم با آن یک web بالا آورد.

این framework توسط آقای [Taylor Otwell](https://github.com/taylorotwell) توسعه پیدا کرده و document version 9 آن را میتوان از [اینجا](https://github.com/taylorotwell) خواند.

این framework کامل بر اساس design pattern MVC کار می کند که فولدر بندی آن به این صورت است:

-   [app](app/) کد اصلی برنامه که شامل اکثر کلاس ها

    -   [Excetions](app/Excetions) کنترل کردن errors
    -   [Http](app/Http) شامل middlewares و Controllers
    -   [Models](app/Models) شامل مدل ها

-   [bootstrap](bootsrap/)

کار اصلی bootstrap راه اندازی برنامه و cache کردن جهت performance بالاتر

-   [config](config/) شامل تمام کانفیگ یا تنظیمات اصلی برنامه

-   [database](database/) کار با سرور و دیتابیس

    -   [factories](database/factories/)

    برای ساختن قالب جهت database seeders مورد استفاده قرار می گیرد

    -   [migrations](database/migrations/) برای ساختن جداول اولیه در database

    -   [seeders](database/seeders/) برای ساختن اطلاعات معمولا fake

-   [lang](lang/) شامل زبان ها و translators

-   [public](public/) هر request به اینجا می آید و شامل assets ها هم هست

-   [resources](resources/) شامل view ها و css و js کامپایل نشده

-   [routes](routes/) شامل تمامی routes

-   [storage](storage/) تمام فایل ها ای که در laravel ساخته می شوند اینجا ذخیره میشوند مانند cache یا compiled blade

-   [tests](tests/) برای تست اتومات کامل اپ

-   [vendor](vendor/) composer

# 2. What is Artisan in Laravel?

فایل artisan یک فایل ورودی command برای انجام دادن خیلی از کار ها مانند generate یا make کردن انواع کلاس هایی که ما به آن احتیاج داریم ساخته شده

تمام دستورات آن را می توان با استفاده از `php artisan list` دریافت کرد و از آن استفاده کرد.

همچنین برای آن help هم نوشته اند که با استفاده از آن می توان فهمید چگونه از این list استفاده نمود. بصورت مثال:

`$ php artisan help migrate`

# 3. What is template engine? Name some popular template engines... Which one is used by laravel?

موتور های قالب یا template engines
زمانی استفاده می شوند که می خواهید به سرعت برنامه های وب بسازید که به اجزای مختلف تقسیم می شوند. template ها همچنین رندر سریع داده های سمت سرور یا server-side rendering را که باید به برنامه ارسال شوند، فعال می کنند.

معروف ترین آنها عبارت اند از: Ejs, Jade, Pug, Mustache, HandlebarsJS, Jinja2, and Blade.

لاراول از template engine Blade استفاده می کند.

# 4. Explain the request lifecycle in laravel.

## 1. autoload

وقتی یک درخواست یا request از سمت کاربر به برنامه ارسال می شود اولین جایی که وارد می شود `public/index.php` میباشد که این فایل یک نمونه از فایل اپ Laravel را با استفاده از composer autoload از فایل `bootstrap/app.php` می سازد و با استفاده از service containers ادامه میدهد.

### 2. kernel هسته برنامه

بعد از آن درخواست با توجه به نوع آن وارد HTTP / Console Kernel هسته برنامه یک درخواست دریافت می کند و به آن پاسخ می دهد. این پیکر بندی شامل bootstrapper ها می باشد که تمام مسئولیت رسیدگی به خطا ، پیکربندی ورود به سیستم (configure logging) ، مسیریابی های تعریف شده در فایل env و سایر کارهایی را که باید قبل از انجام درخواست ارسالی انجام شود را برعهده دارد.

کرنل HTTP همچنین لیستی از middleware هایی که قبل از استفاده از برنامه باید مورد توجه قرار بگیرد را نیز تعریف خواهد کرد.

### 3. service providers

مرحله بعداز گذشتن از kernelها، لود کردن ارائه دهندگان خدمات (Service Providers) هستند که بخشی از عملکرد های bootstrapping میباشند. Service Providers مورد نیاز برای برنامه در فایل `config/app.php` قرار دارند.

همینطور که متدهای تعریف شده صدا زده میشوند، تمام providers ثبت می شوند. پس از ثبت و تعریف همه ی providers ، روش های بوت providers ها صدا زده میشود.

### 4. routing

بعد از لود شدن سرویس ها مهم ترین آن که `App\Providers\RouteServiceProvider` می باشد تمام route های برنامه ما را لود می کند

در این مرحله آن request ارسالی به controller یا متد مربوط اعزام میشود که در آنجا اگر middleware هم داشته باشیم آن هم اجرا می شود.

بطور مثال خود laravel یک middleware برای اهراز حویت یا Authentication دارد که تا کاربر login نکرده باشد اجازه دیدن آن url را نداشته باشد و به صفحه login منتقل شود.

همچنین بعد از اینکه از ارسال پاسخ یا response دوباره از چرخه میان برنامه ها یا middlwares دوباره رد میشود.

### 5. finishing up مرحله نهایی

در آخر که پاسخ برگشت به فایل `index.php` ارسال می شود و در آن از متد send استفاده می شود که جواب به مرور گر برگردد.

# 5. What is recourses used for?

روت resource یا منابع شامل تمام view های ما مثل layout و components ها هستند و همچنین یکسری فایل های js و css کامپایل نشده (مانند css اصلی tailwind و js react یا vue)

# 6. What is Named routes for?

ما می توانیم یک url را با استفاده از متد name('route_name') اسم گذاری کنیم و از helper function route('route_name') برای دریافت آن url استفاده کنیم. همچنین می توانیم به آن پارامتر هم بدهیم:

```php
Route::get('/post/{post}', function (Post $post) {
    //
})->name('post.show');

echo route('post.show', ['post' => 1]);

// http://example.com/post/1
```

# 6. {{  }} vs. {!! !!}

بطور پیشفرض در blade عبارت {{  }} از داخل php function `htmlspecialchars` عبور می کند که جلوی حمله XSS را بگیرد و به ما خروجی کاراکتر ها را بدهد.

اگر بخواهیم که کد را اجرا کنیم از {!! !!} استفاده می کنیم.

# 7. Make /{cat}/{id}/{title}

راه حل در [routes/web.php](routes/web.php)
فایل ها ساخته شده ور [resources/view](resources/views/)
