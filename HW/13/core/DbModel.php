<?php

namespace app\core;

abstract class DbModel extends Model
{
    abstract public function tableName(): string;
    abstract public function attributes(): array;

    public function save()
    {
        $tableName = $this->tableName();
        $attributes = $this->attributes();
        $params = array_map(fn ($attr) => ":$attr", $attributes);
        $query = "INSERT INTO $tableName (" . implode(",", $attributes) . ")
            VALUES (" . implode(',', $params) . ");";
        $statement = $this->prepare($query);
        foreach ($attributes as $attribute) {
            $statement->bindParam(":$attribute", $this->{$attribute});
        }

        $statement->execute();
        return true;
    }

    public function prepare($sql)
    {
        return Application::$app->db->prepare($sql);
    }
}
