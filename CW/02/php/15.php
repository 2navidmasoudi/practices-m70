<?php
/*

[
    "google.com",
    "Microsoft.com",
    [
        "Google.com" => "cloud",
        "microsoft.com" => "office",
    ],
    [
        "Microsoft.com" => "azure",
    ],
    [
        "Office" => [
            "word", "excel",
        ],
    ],
];
to
[
    "google.com" => [
        "cloud"
    ],
    "Microsoft.com" => [
        "office" => [
            "word",
            "exel"
        ],
        "azure"
    ]
]
*/

$arr = [
    "google.com",
    "Microsoft.com",
    [
        "Google.com" => "cloud",
        "microsoft.com" => "office",
    ],
    [
        "Microsoft.com" => "azure",
    ],
    [
        "Office" => [
            "word", "excel",
        ],
    ],
];

// For making all elem lowercase
foreach ($arr as $key => &$value) {
    if (is_array($value))
        $value = array_change_key_case($value, CASE_LOWER);
    else
        $value = strtolower($value);
}

// array_walk_recursive($arr, function (&$value) {
//     $value = strtolower($value);
// });

print_r($arr);

function flat_array($array)
{
    $flat = array();
    foreach ($array as $value) {
        if (is_array($value))
            $flat = array_merge($flat, flat_array($value));
        else
            $flat[] = $value;
    }
    return $flat;
}

function group_array($array)
{
    $components = flat_array($array);
    // print_r($components);
    $result = [];
    foreach ($components as $value) {
        if ($newArray = array_column($array, $value)) {
            $result = array_merge($result, [$value => $newArray]);
        }
    }
    return $result;
}

function unique_array(&$array)
{
    foreach ($array as $key => $value) {
        if (is_array($value)) {
            foreach ($value as $pairValue) {
                // pairValue = office
                // $key = microsoft.com
                if ($array[$key][array_search($pairValue, $array)] == $pairValue) {
                    $array[$key][$pairValue] = $array[$pairValue];
                    unset($array[$key][array_search($pairValue, $array[$key])]);
                    unset($array[$pairValue]);
                }
            }
        }
    }
    // $array['microsoft.com']['office'] = $array['office'];
    // unset($array['microsoft.com'][array_search("office", $array['microsoft.com'])]);
    // unset($array['office']);
    return $array;
}

$arr = group_array($arr);
$arr = unique_array($arr);
print_r($arr);
