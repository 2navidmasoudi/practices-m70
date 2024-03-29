<?php

namespace app\models;

use app\core\Model;

class Doctor extends Model
{
    public static function Do()
    {
        return new User('doctors');
    }

    public function getByUserId($userId)
    {
        return $this->find($userId, 'user_id');
    }
}
