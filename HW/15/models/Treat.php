<?php

namespace app\models;

use app\core\Model;

class Treat extends Model
{
    public static function Do()
    {
        return new Treat('treats');
    }
}
