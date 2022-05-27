<?php

namespace app\models;

use app\core\Model;

class Unit extends Model
{
    public static function Do()
    {
        return new User('units');
    }
}
