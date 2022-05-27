<?php

namespace app\core;

class Session
{

    public static function start()
    {
        session_start();
    }

    public static function put($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public static function get($key)
    {
        return $_SESSION[$key] ?? null;
    }

    public static function has($key)
    {
        return isset($_SESSION[$key]);
    }

    public static function forget($key)
    {
        unset($_SESSION[$key]);
    }

    public static function flash($name, $message, $duration = 5, $path = "/")
    {
        setcookie($name, $message, $duration, $path);
    }

    public static function destroy()
    {
        session_destroy();
    }
}
