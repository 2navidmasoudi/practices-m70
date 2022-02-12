<?php

# To test this function, simply run "test/1.php"

function oddSeperator(...$nums)
{
    $odds = [];

    foreach ($nums as $n) {
        // & is bitwise operator
        // so $n & 1 = 1 if the number is odd
        // and $n & 1 = 0 if the number is even
        if ($n & 1)
            $odds[] = $n;
    }

    // sort is optional here...
    // sort($odds);

    // we can use bubble sort in function below
    bubble_sort($odds);

    echo implode(",", $odds);
}

// this is bubble sort. Time Complexity O(n^2)
function bubble_sort(&$arr)
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
}
