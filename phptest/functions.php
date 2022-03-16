<?php

$add = fn ($multy, ...$arg) => array_reduce(
    $arg,
    fn ($carry, $n) => $multy ? $n * $carry : $n + $carry,
    $initial
);

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

echo "sum: " . add_numbers(false, 1, 2.2, 3, 4, 5);
