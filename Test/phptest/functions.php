<?php

$add_numbers = fn ($multy, ...$arg) => array_reduce(
    $arg,
    fn ($carry, $n) => $multy ? $n * $carry : $n + $carry,
    $initial
);

function add_numbers($multy, ...$arg)
{
    return array_reduce(
        $arg,
        function ($carry, $n) use ($multy) {
            return  $multy ? $n * $carry : $n + $carry;
        },
        $multy ? 1 : 0
    );
}

if (!function_exists('add_numbers')) {
    /**
     * Returns the sum.
     *
     * we can multiply or 
     *
     * @param bool $multy     bool of multy or not;
     * @param array $arg      array to sum.
     *
     * @return int sum of array
     */
    function add_numbers($multy, ...$arg)
    {
        $sum = 0;
        $initial = $multy ? 1 : 0;

        $sum = array_reduce(
            $arg,
            fn ($carry, $n) => $multy ? $n * $carry : $n + $carry,
            $initial
        );

        return $sum;
    }
}

// echo "sum: " . add_numbers(false, 1, 2.2, 3, 4, 5);
// echo "sum: " . $add_numbers(false, 1, 2.2, 3, 4, 5);





// function jame_adad(...$adad)
// {
//     $jam = 0;

//     foreach ($adad as $value) {
//         $jam += $value;
//     }

//     return $jam;
// }

function jame_adad(...$adad)
{
    return array_reduce(
        $adad,
        function ($carry, $n) {
            echo "carry: $carry \nn: $n\n";
            return $carry + $n;
        },
        0
    );
}

function zarb_adad(...$adad)
{
    return array_reduce(
        $adad,
        fn ($carry, $n) => $carry * $n,
        1
    );
}

echo zarb_adad(1, 2, 3, 4, 5);
