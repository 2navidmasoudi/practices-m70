<?php

namespace app\models;

use app\core\Application;
use app\core\Model;

class Doctor extends Model
{
    public function getTable(): string
    {
        return "doctors";
    }

    public function filter($unit_id, $search)
    {
        $searches = $search ? explode(" ", $search) : [];
        $query = $this->select();
        if ($unit_id) {
            $query->where('unit_id', $unit_id, "=");
        }
        if (!empty($searches)) {
            foreach ($searches as $key => $search) {
                $query
                    ->where('firstname', "%{$search}%", "LIKE", $key === 0 ? "AND" : "OR")
                    ->where('lastname', "%{$search}%", "LIKE", "OR");
            }
        }
        return $query->get();
    }
}
