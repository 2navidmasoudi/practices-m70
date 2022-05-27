<?php

use app\core\Auth;

function isLogin()
{
    if (Auth::getInstance()->isLogin()) {
        return true;
    }
    return false;
}

function isUser()
{
    if (Auth::getInstance()->isUser()) {
        return true;
    }
    return false;
}

function isAdmin()
{
    if (Auth::getInstance()->isAdmin()) {
        return true;
    }
    return false;
}

function isDoctor()
{
    if (Auth::getInstance()->isDoctor()) {
        return true;
    }
    return false;
}

function hasProfile()
{
    if (Auth::getInstance()->hasProfile()) {
        return true;
    }
    return false;
}
