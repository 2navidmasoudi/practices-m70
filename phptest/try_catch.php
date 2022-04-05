<?php

try {
    // $name = 1 / 0;
    $name = "navid";

    if ($name == "navid") {
        throw new Exception("Na be navid");
    }

    echo "Salam Navid";
} catch (\Throwable $th) {
    echo $th->getMessage() . PHP_EOL;
    // echo "eeee in che karie" . PHP_EOL;
} finally {
    echo "finally";
}

echo "baghie code";
