<?php

namespace app\models;

use app\core\Model;

class Picture extends Model
{
    public function getTable(): string
    {
        return "pictures";
    }
}
