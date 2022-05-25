<?php

namespace app\models;

use app\core\Model;

class Unit extends Model
{
    public function getTable(): string
    {
        return "units";
    }
}
