<?php

namespace app\models;

use app\core\Model;

class Work extends Model
{
    public static function Do()
    {
        return new Work('works');
    }
}
