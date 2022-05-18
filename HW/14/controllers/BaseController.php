<?php

namespace app\controllers;

use app\core\Controller;
use app\models\Doctor;

class BaseController extends Controller
{
    public function __construct()
    {
        $this->setLayout('main');
    }
    public function home()
    {
        $doctors = Doctor::do()->all();
        return $this->render("home", ['doctors' => $doctors]);
    }
    public function profile()
    {
        return $this->render('profile');
    }
}
