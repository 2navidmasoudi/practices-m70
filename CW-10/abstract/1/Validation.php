<?php

class Validation
{
    private static $input, $range;
    private static array $result;
    public static function validate($input, $validation_array, $strictMode = 0)
    {
        self::$input = $input;

        foreach ($validation_array as $method) {
            $method_name = strtolower($method);
            if (str_contains($method_name, "len")) {

                $method_name = "str_len";

                preg_match_all("/(\d+)/", $method, $found);
                $range = $found[0];

                if (count($range) == 1 or count($range) == 2) {
                    sort($range);
                    self::$range = $range;
                } else {
                    self::$range = [];
                }
            } elseif (!method_exists(__CLASS__, $method_name)) {

                $e = new Exception("Exception :$method_name method not found" . PHP_EOL);
                echo $e->getMessage();

                /**
                 * If you want to get false reuslt
                 * when you don't have the method
                 * uncomment the line below.
                 */
                // if ($strictMode) return false;

                self::$result[$method] = NULL;
                continue;
            }

            $validate = self::$method_name();
            if ($strictMode) {
                if (!$validate) return false;
            } else {
                // echo $validate
                //     ? "$method is valid" . PHP_EOL
                //     : "$method is invalid" . PHP_EOL;

                // self::$result[$method] = $validate
                //     ? "valid"
                //     : "invalid";

                self::$result[$method] = $validate
                    ? TRUE
                    : FALSE;
            }
        }

        if ($strictMode) return true;
        return self::$result;
    }

    private static function email()
    {
        return !!filter_var(self::$input, FILTER_VALIDATE_EMAIL);
    }

    private static function number()
    {
        return !!preg_match('/^(?:\+|-)?\d+$/', self::$input);
    }

    private static function alpha()
    {
        return !!preg_match('/^[a-z A-Z]+$/', self::$input);
    }

    private static function national_code()
    {
        return !!preg_match('/^\d{10}$/', self::$input);
    }

    private static function phone()
    {
        return !!preg_match('/^(?:\+98|0)9\d{9}$/', self::$input);
    }

    private static function num_alpha()
    {
        return !!preg_match('/^\w+$/', self::$input);
    }
    private static function str_len()
    {
        if (count(self::$range) == 0) {
            return false;
        } elseif (count(self::$range) == 1) {
            return strlen(self::$input) == self::$range[0];
        } else {
            return strlen(self::$input) >= self::$range[0]
                and strlen(self::$input) <= self::$range[1];
        }
    }
}
