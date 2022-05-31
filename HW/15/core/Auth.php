<?php

namespace app\core;

use app\models\Profile;
use app\models\User;

class Auth
{
    private static ?Auth $instance = null;
    private $user = null;
    private $doctor = null;
    private $profile = null;
    private $role = null;

    private function __construct()
    {
        $this->check();
    }

    public static function getInstance()
    {
        if (self::$instance == null)
            self::$instance = new Auth();

        return self::$instance;
    }

    public function check()
    {
        if (Session::has('user_id'))
            $this->user = User::Do()->getById(Session::get('user_id'));

        if ($this->hasProfile())
            $this->profile = Profile::Do()->getByUserId($this->user->id);

        if ($this->isDoctor())
            $this->doctor = Profile::Do()->getByUserId($this->user->id);
    }

    public function isLogin()
    {
        return $this->user != null;
    }

    public function isUser()
    {
        return $this->getRole() === 'user';
    }

    public function isAdmin()
    {
        return $this->getRole() === 'admin';
    }

    public function isDoctor()
    {
        return $this->getRole() === 'doctor';
    }

    public function hasProfile()
    {
        return $this->user->profile_id ?? false;
    }

    public function isConfirmed()
    {
        return $this->user->status != 0;
    }

    public function getName()
    {
        return $this->profile->firstname . ' ' . $this->profile->lastname;
    }

    public function getFirstname(): string
    {
        return $this->profile->firstname ?? null;
    }

    public function getLastname(): string
    {
        return $this->profile->lastname ?? null;
    }

    public function getEmail(): string
    {
        return $this->profile->email ?? null;
    }

    public function getRole()
    {
        return $this->user->role ?? false;
    }

    public function getId()
    {
        return $this->user->id;
    }
}
