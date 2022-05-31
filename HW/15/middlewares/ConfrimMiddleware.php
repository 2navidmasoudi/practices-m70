<?php

namespace app\middlewares;

class ConfirmMiddleware implements Middleware
{
    public static function check()
    {
        if (isLogin() && isConfirmed()) {
            return true;
        }
        return false;
    }
}
