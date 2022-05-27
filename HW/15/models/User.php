<?php

namespace app\models;

use app\core\Model;

class User extends Model
{
    public static function Do()
    {
        return new User('users');
    }

    public function getById(int $id)
    {
        return $this->find($id);
    }

    public function validateLogin(string $username, string $password)
    {
        return $this->select()->where('username', $username)->where('password', $password)->get()->id ?? false;
    }
}
