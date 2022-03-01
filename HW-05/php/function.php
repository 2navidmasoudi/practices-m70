<?php

include $_SERVER["DOCUMENT_ROOT"] . "/php/variable.php";

function rand_str($n)
{
    $str = [...range('a', 'z'), ...range('A', 'Z'), ...range(0, 9)];
    $rand_text = "";
    for ($i = 0; $i < $n; $i++) {
        $rand_text .= $str[rand(0, count($str) - 1)];
    }
    return $rand_text;
}

function sort_dir_files($dir)
{
    $sortedData = array();
    foreach (scandir($dir) as $file) {
        if (is_file($dir . '/' . $file))
            array_push($sortedData, $file);
        else
            array_unshift($sortedData, $file);
    }
    return $sortedData;
}

function listFolderFiles($dir)
{
    global $root;
    $ffs = sort_dir_files($dir);

    unset($ffs[array_search('.', $ffs, true)]);
    unset($ffs[array_search('..', $ffs, true)]);

    // prevent empty ordered elements
    if (count($ffs) < 1)
        return;

    foreach ($ffs as $key => $ff) {
        if (is_dir($dir . '/' . $ff)) {
            $ffs[$dir . '/' . $ff] = listFolderFiles($dir . '/' . $ff);
        } else {
            $ffs[$ff] = [
                "name" => $ff,
                "path" => "$dir/$ff",
                "size" => filesize("$dir/$ff"),
                "parent" => $dir,
                "relative" => str_replace($root, "", "$dir/$ff"),
                "ext" => pathinfo("$dir/$ff", PATHINFO_EXTENSION),
            ];
        }
        unset($ffs[$key]);
    }
    return $ffs;
}


function get_folder_size($array)
{
    $sizes = array_column_recursive($array, 'size');
    return array_reduce($sizes, fn ($carry, $n) => $carry + $n, 0);
}

if (!function_exists('array_column_recursive')) {
    /**
     * Returns the values recursively from columns of the input array, identified by
     * the $columnKey.
     *
     * Optionally, you may provide an $indexKey to index the values in the returned
     * array by the values from the $indexKey column in the input array.
     *
     * @param array $input     A multi-dimensional array (record set) from which to pull
     *                         a column of values.
     * @param mixed $columnKey The column of values to return. This value may be the
     *                         integer key of the column you wish to retrieve, or it
     *                         may be the string key name for an associative array.
     * @param mixed $indexKey  (Optional.) The column to use as the index/keys for
     *                         the returned array. This value may be the integer key
     *                         of the column, or it may be the string key name.
     *
     * @return array
     */
    function array_column_recursive($input = NULL, $columnKey = NULL, $indexKey = NULL)
    {

        // Using func_get_args() in order to check for proper number of
        // parameters and trigger errors exactly as the built-in array_column()
        // does in PHP 5.5.
        $argc   = func_num_args();
        $params = func_get_args();
        if ($argc < 2) {
            trigger_error("array_column_recursive() expects at least 2 parameters, {$argc} given", E_USER_WARNING);

            return NULL;
        }
        if (!is_array($params[0])) {
            // Because we call back to this function, check if call was made by self to
            // prevent debug/error output for recursiveness 🙂
            $callers = debug_backtrace();
            if ($callers[1]['function'] != 'array_column_recursive') {
                trigger_error('array_column_recursive() expects parameter 1 to be array, ' . gettype($params[0]) . ' given', E_USER_WARNING);
            }

            return NULL;
        }
        if (
            !is_int($params[1])
            && !is_float($params[1])
            && !is_string($params[1])
            && $params[1] !== NULL
            && !(is_object($params[1]) && method_exists($params[1], '__toString'))
        ) {
            trigger_error('array_column_recursive(): The column key should be either a string or an integer', E_USER_WARNING);

            return FALSE;
        }
        if (
            isset($params[2])
            && !is_int($params[2])
            && !is_float($params[2])
            && !is_string($params[2])
            && !(is_object($params[2]) && method_exists($params[2], '__toString'))
        ) {
            trigger_error('array_column_recursive(): The index key should be either a string or an integer', E_USER_WARNING);

            return FALSE;
        }
        $paramsInput     = $params[0];
        $paramsColumnKey = ($params[1] !== NULL) ? (string) $params[1] : NULL;
        $paramsIndexKey  = NULL;
        if (isset($params[2])) {
            if (is_float($params[2]) || is_int($params[2])) {
                $paramsIndexKey = (int) $params[2];
            } else {
                $paramsIndexKey = (string) $params[2];
            }
        }
        $resultArray = array();
        foreach ($paramsInput as $row) {
            $key    = $value = NULL;
            $keySet = $valueSet = FALSE;
            if ($paramsIndexKey !== NULL && array_key_exists($paramsIndexKey, $row)) {
                $keySet = TRUE;
                $key    = (string) $row[$paramsIndexKey];
            }
            if ($paramsColumnKey === NULL) {
                $valueSet = TRUE;
                $value    = $row;
            } elseif (is_array($row) && array_key_exists($paramsColumnKey, $row)) {
                $valueSet = TRUE;
                $value    = $row[$paramsColumnKey];
            }

            $possibleValue = array_column_recursive($row, $paramsColumnKey, $paramsIndexKey);
            if ($possibleValue) {
                $resultArray = array_merge($possibleValue, $resultArray);
            }

            if ($valueSet) {
                if ($keySet) {
                    $resultArray[$key] = $value;
                } else {
                    $resultArray[] = $value;
                }
            }
        }

        return $resultArray;
    }
}
