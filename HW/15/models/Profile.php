<?php

namespace app\models;

use app\core\Model;

class Profile extends Model
{
    public static function Do()
    {
        return new Profile('profiles');
    }

    public function getByUserId($userId)
    {
        return $this->find($userId, 'user_id');
    }
}
