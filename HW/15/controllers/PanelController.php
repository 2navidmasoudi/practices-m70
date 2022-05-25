<?php

namespace app\controllers;

use app\core\Controller;

class PanelController extends Controller
{
    public function __construct()
    {
        $this->setLayout('panel');
    }
    public function panel()
    {
        return $this->render('panel');
    }
    public function units()
    {
        return $this->render('units');
    }
    public function confirm()
    {
        return $this->render('confirm');
    }
    public function work()
    {
        return $this->render('work');
    }
}
