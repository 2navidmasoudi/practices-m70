<?php

namespace app\models;

use app\core\Model;

class Work extends Model
{
    public function getTable(): string
    {
        return "works";
    }
}
