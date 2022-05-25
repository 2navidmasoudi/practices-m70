<?php

namespace app\models;

use app\core\Model;

class Manager extends Model
{
    public function getTable(): string
    {
        return "managers";
    }
}
