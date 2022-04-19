<?php

// $students = [
//     // 1  => "Masoudi",
//     // 5  => "Barzegari",
//     // 7  => "Khanjari",
//     // 10 => "Rajab'ali",
//     // 12 => "Sadeghi",
//     // 13 => "Abpeykar",
//     // 14 => "Ardebili",
//     21 => "Karimi",
//     26 => "Madani",
// ];
// echo "Aghaye " . $students[array_rand($students)];

class Exercise
{
    const STUDENTS = [
        # Group 1
        1 => [
            12 => "حسن صادقی",
            7 => "صدرا خنجری",
            10 => "امیر رجبعلی",
            21 => "امیرکریمی",
            19 => "عماد عیسوی",
            "?_1" => "مستمع آزاد(حمیدرضا سمیعی)",
        ],

        # Group 2
        2 => [
            1 => "محمد نوید مسعودی",
            13 => "محمدامین آب پیکر",
            14 => "میر محمدحسن اردبیلی",
            5 => "سید حسین برزگری",
            26 => "رسول مدنی",
        ],

        # Group 3
        3 => [
            20 => "امیرحسین منصور سمائی",
            16 => "محمد مالمیر",
            15 => "دانیال ملکیان",
            18 => "سید امیرحسین دهقانی",
            17 => "علیرضا علی زاده",
            "?_3" => "مستمع آزاد(علی الهیارلو)",
        ],

        # Group 4
        4 => [
            3 => "حسین مومنی",
            29 => "سید پدرام خدارحمی",
            25 => "پارسا جدیدی",
            6 => "سید حسن حسینی نژاد",
            2 => "محمدرضا سعیدی",
            11 => "امیر ریاضی زاده",
            "?_4" => "مستمع آزاد(امیرحسین سبزه زار)",
        ],

        # Group 5
        5 => [
            30 => "یونس مختاری دوقزلو",
            28 => "حسین قیداری",
            24 => "سید امیررضا اردبیلی",
            22 => "محمدپناهپوری",
            8 => "محمد حیدری",
            "?_5" => "مستمع آزاد(محمود محسنی)",
        ],

        # Group 6
        6 => [
            31 => "سید صادق موسوی",
            4 => "آرمین عیوضی",
            33 => "عرفان معینی",
            32 => "امیرپاشا عامری",
            23 => "حسین ولدخانی",
            "?_6" => "مستمع آزاد(رضا سلوکی)",
        ],
    ];

    public static function getRandom(int ...$groups)
    {
        $all = [];
        foreach ($groups as $group) {
            foreach (self::STUDENTS[$group] as $key => $student) {
                $all[$key] = $student;
            }
        }
        // print_r($all);
        shuffle($all);
        echo "آقایان :\n";
        foreach ($all as $key => $student) {
            echo $key + 1 . ". " . $student . "\n";
        }
    }
}

// Give any group numbers like 2,5,6
Exercise::getRandom(1, 2);
