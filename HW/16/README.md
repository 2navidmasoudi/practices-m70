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
