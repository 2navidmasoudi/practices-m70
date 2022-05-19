<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Request;
use app\models\Doctor;
use app\models\Unit;
use app\models\Work;

class BaseController extends Controller
{
    public function __construct()
    {
        $this->setLayout('main');
    }
    public function home()
    {
        $doctors = Doctor::do()->all();
        $units = Unit::do()->all();
        return $this->render("home", ['doctors' => $doctors, 'units' => $units]);
    }
    public function doctor(Request $request)
    {
        $doctor = false;
        $id = $request->getId();
        if ($id) $doctor = Doctor::do()->find($id);
        if ($doctor === false) return $this->home();
        $works = Work::do()->findAll($id, "doctor_id");
        return $this->render("doctor", ['doctor' => $doctor, 'works' => $works]);
    }
    public function profile()
    {
        return $this->render('profile');
    }
}
