<?php

namespace app\controllers;

use app\core\Controller;
use app\middlewares\AuthMiddleware;
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
    public function home(Request $request)
    {
        $doctors = [];
        $units = Unit::do()->all() ?? [];
        if ($request->isPost()) {
            $data = $request->getBody();
            $unit_id = $data['unit_id'];
            $search = $data['search'];
            // $doctors = Doctor::do()->filter($unit_id, $search);
            $doctors = [];
            return $this->render("home", ['doctors' => $doctors, 'units' => $units, 'unit_id' => $unit_id, 'search' => $search]);
        }
        $doctors = Doctor::do()->all();
        return $this->render("home", ['doctors' => $doctors, 'units' => $units, 'unit_id' => '', 'search' => '']);
    }
    public function doctor(Request $request)
    {
        $doctor = [];
        $works = [];
        $units = Unit::do()->all() ?? [];

        $id = $request->getId();
        if ($id) {
            $doctor = Doctor::do()->find($id);
            $works = Work::do()->findAll($id, "doctor_id");
        } else {
            return $this->home($request);
        }
        // if ($doctor === false) return $this->home();
        return $this->render("doctor", ['doctor' => $doctor, 'works' => $works, 'units' => $units]);
    }
    public function profile()
    {
        if (!AuthMiddleware::check()) {
            return $this->render('_403');
        }
        return $this->render('profile');
    }
}
