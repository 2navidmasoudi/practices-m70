<?php

use app\core\Application;
use app\core\Session;

/**
 * Session helper:
 * 
 * no $key and $value will execute session_start()
 * 
 * $key only returns $_SESSION[$key]
 * 
 * $key and $value sets $_SESSION[$key] with certain $value
 * 
 * @param string $key [optional]
 * @param string $value [optional]
 * @return mixed
 */
function session(?string $key = null, mixed $value = null): mixed
{
    if (is_null($key) && is_null($value)) {
        Session::start();
        return null;
    }

    if (is_null($value)) {
        return Session::get($key);
    }

    Session::put($key, $value);
}
