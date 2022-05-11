<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\models\Register;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->setLayout('auth');
    }

    public function login()
    {
        return $this->render('login');
    }

    public function register(Request $request)
    {
        $registerModel = new Register();
        if ($request->isPost()) {
            $registerModel->loadData($request->getBody());

            if ($registerModel->validate() && $registerModel->save()) {
                Application::$app->response->redirect('/');
            }
        }
        return $this->render('register', [
            'model' => $registerModel
        ]);
    }
}
