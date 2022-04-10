<?php

class Log
{
    private static array $logs = [];

    public static function log(
        mixed $data,
        string $method,
    ) {
        self::$logs[] = (object) [
            "data" => $data,
            "method" => $method,
            "time" => date("c"),
            "request_url" => $_SERVER["REQUEST_URI"],
            "protocol" => "http://",
            "memory_useage" => memory_get_usage()
        ];
    }

    public static function output()
    {
        print_r(self::$logs);
    }
}
