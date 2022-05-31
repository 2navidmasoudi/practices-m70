<?php

namespace app\middlewares;

class AuthMiddleware implements Middleware
{
    public static function check()
    {
        if (isLogin()) {
            return true;
        }
        return false;
    }
}
