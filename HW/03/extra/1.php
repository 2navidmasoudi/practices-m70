<?php

# https://quera.org/problemset/6193/

$input = readline();
// $input = "Abbaabss";
// $input = "CharzE";

function PESencode(&$str)
{
    // lower all the chars then turn it into array
    $lower = str_split(strtolower($str));

    // count how many times each chars repeated.
    $alphaCounts = array_count_values($lower);

    // range makes an array from start value to end value.
    // we can get chars of $x by $alphaRange[$x]
    $alphaRange = range('a', 'z');

    foreach ($lower as $key => $chr) {
        // skips whitespaces
        if ($chr == " ") continue;

        // if char repeated we had it in alphaCounts
        $x = $alphaCounts[$chr] ?? 0;

        // get the key of alphaRange, a => 0 ... z => 25
        $a = array_search($chr, $alphaRange);

        // decoding formula in the question
        $y = ($x * $a + 1) % 26;

        // find the replacement charecter in alphaRange
        $replace = $alphaRange[$y];

        // check if the charecter in input is upper or not
        $str[$key] =
            ctype_upper($str[$key])
            ? strtoupper($replace)
            : $replace;
    }
}

PESencode($input);

echo $input;
