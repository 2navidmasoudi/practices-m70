<?php

namespace app\models;

use app\core\Model;

class Picture extends Model
{
    public static function Do()
    {
        return new Picture('pictures');
    }
}
