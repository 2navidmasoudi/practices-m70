<?php

/*
4. Write a function to sort an array.
*/

// this is bubble sort.
function array_sort($arr)
{
    for ($i = count($arr) - 1; $i >= 0; $i--) {
        for ($j = 1; $j <= $i; $j++) {
            if ($arr[$j] < $arr[$j - 1]) {
                [$arr[$j - 1], $arr[$j]] = [$arr[$j], $arr[$j - 1]];

                // or

                // $temp = $arr[$j - 1];
                // $arr[$j - 1] = $arr[$j];
                // $arr[$j] = $temp;
            }
        }
    }
    return $arr;
}

// print_r(array_sort([7, 5, 2, 4, 3, 9]));
print_r(array_sort(['bc', 'bb', 'z', 'y', 'x', 'k']));
