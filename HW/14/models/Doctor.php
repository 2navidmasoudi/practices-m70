<?php

namespace app\models;

use app\core\Model;

class Doctor extends Model
{
    public function getTable(): string
    {
        return "doctors";
    }
}
