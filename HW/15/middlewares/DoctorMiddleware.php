<?php

namespace app\middlewares;

class DoctorMiddleware implements Middleware
{
    public static function check()
    {
        if (isLogin() && isDoctor() && isConfirmed()) {
            return true;
        }
        return false;
    }
}
