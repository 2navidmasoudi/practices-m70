<?php

namespace app\controllers;

use app\core\Controller;
use app\middlewares\ConfirmMiddleware;
use app\middlewares\DoctorMiddleware;
use app\middlewares\ManagerMiddleware;

class PanelController extends Controller
{
    public function __construct()
    {
        $this->setLayout('panel');
    }
    public function panel()
    {
        if (!ConfirmMiddleware::check()) {
            return $this->render('_403');
        }
        return $this->render('panel');
    }
    public function units()
    {
        if (!ManagerMiddleware::check()) {
            return $this->render('_403');
        }
        return $this->render('units');
    }
    public function confirm()
    {
        if (!ManagerMiddleware::check()) {
            return $this->render('_403');
        }
        return $this->render('confirm');
    }
    public function work()
    {
        if (!DoctorMiddleware::check()) {
            return $this->render('_403');
        }
        return $this->render('work');
    }
    public function visits()
    {
        if (!DoctorMiddleware::check()) {
            return $this->render('_403');
        }
        return $this->render('visits');
    }
}
