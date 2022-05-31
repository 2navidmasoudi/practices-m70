<?php

namespace app\controllers;

use app\core\Application;
use app\core\Auth;
use app\core\Controller;
use app\core\Error;
use app\core\Request;
use app\core\Response;
use app\core\Session;
use app\core\Validation;
use app\models\Register;
use app\models\User;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->setLayout('auth');
    }

    public function login(Request $request, Response $response)
    {
        if ($request->isPost()) {
            $data = $request->getBody();
            $username = $data['username'];
            $password = $data['password'];

            Validation::make()->data($data)->rules([
                'username' => ['required'],
                'password' => ['required'],
            ])->validate();

            if (Error::getInstance()->hasError()) {
                return $this->render('login', ['errors' => Error::getInstance()]);
            }

            $id = User::Do()->validateLogin($username, $password);
            if ($id !== false) {
                Session::put('user_id', $id);
                $response->redirect('/');
            } else {
                Error::getInstance()->addError('login', "Wrong username or password");
            }
        }
        return $this->render('login', ['errors' => Error::getInstance()]);
    }

    public function logout(Request $request, Response $response)
    {
        Session::destroy();
        $response->redirect('/');
    }

    public function register(Request $request, Response $response)
    {
        if ($request->isPost()) {
            $data = $request->getBody();

            Validation::make()->data($data)->rules($this->registerRules())->validate();

            if (Error::getInstance()->hasError()) {
                // dd(Error::getInstance()->getErrors());
                return $this->render('register', ['errors' => Error::getInstance()]);
            }

            unset($data['password-confirmation']);
            $result = User::Do()->create($data);
            if ($result !== false) {
                $response->redirect('/login');
            } else {
                Error::getInstance()->addError('register', "Username already exists");
            }
        }
        return $this->render('register', ['errors' => Error::getInstance()]);
    }

    public function registerRules()
    {
        return [
            'username' => [
                'required',
                'username',
                ['minLen', 4],
                ['maxLen', 20]
            ],
            'password' => [
                'required',
                'alphanumeric',
                'confirmation',
                ['minLen', 5],
                ['maxLen', 20]
            ],
        ];
    }
}
