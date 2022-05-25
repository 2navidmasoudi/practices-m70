<?php

namespace app\models;

use app\core\Model;

class Patient extends Model
{
    public function getTable(): string
    {
        return "patinets";
    }
}
