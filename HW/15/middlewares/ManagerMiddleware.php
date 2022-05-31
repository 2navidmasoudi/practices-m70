<?php

namespace app\middlewares;

class ManagerMiddleware implements Middleware
{
    public static function check()
    {
        if (isLogin() && isAdmin() && isConfirmed()) {
            return true;
        }
        return false;
    }
}
