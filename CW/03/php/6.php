<?php

/*
. تابعی بنویسید که مشخص کند یک عدد کامل هست یا نه. سپس با استفاده از این تابع اعداد کامل بین بازه ی a تا b را پیدا کنید. (عدد کامل عددی ست که مجموع مقسوم علیه های آن غیر از خود عدد برابر با همان عدد شود.)
۶ = ۱ + ۲ + ۳ عدد ۶ کامل هست
۱۲ != ۱ + ۲ + ۳ + ۴ +‌ ۶ عدد ۱۲ کامل نیست
*/

function isPerfect($n)
{
    $divArr = [];
    for ($i = 1; $i < $n; $i++) {
        if ($n % $i == 0) {
            $divArr[] = $i;
        }
    }
    $sum = array_reduce($divArr, fn ($carry, $s) => $carry + $s);
    echo implode(" ", $divArr) . "\n";
    if ($sum == $n) {
        echo "$n is a perfect number";
        return true;
    }
    echo "$n is a not perfect number";
    return false;
}

isPerfect(readline());
