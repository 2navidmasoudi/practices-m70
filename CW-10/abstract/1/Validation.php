<?php

class Validation
{
    private static $input;
    private static array $result;
    public static function validate($input, $validation_array, $strictMode = 0)
    {
        self::$input = $input;
        foreach ($validation_array as $function_name) {

            $validation_func = strtolower($function_name);

            if (!method_exists('Validation', $validation_func)) {

                $e = new Exception("Exception :$validation_func method not found" . PHP_EOL);
                echo $e->getMessage();

                /**
                 * If you want to get false reuslt
                 * when you don't have the method
                 * uncomment the line below.
                 */
                // if ($strictMode) return false;

                self::$result[$function_name] = "Not found!";
                continue;
            }

            $validate = self::$validation_func();
            if ($strictMode) {
                if (!$validate) return false;
            } else {
                // echo $validate
                //     ? "$function_name is valid" . PHP_EOL
                //     : "$function_name is invalid" . PHP_EOL;

                self::$result[$function_name] = $validate
                    ? "valid"
                    : "invalid";
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
}
