<?php

namespace app\core;

abstract class Model
{
    protected $table; // which table this model should work on
    private DatabaseInterface $db;
    private DatabaseInterface $query;

    public abstract static function Do();

    protected function __construct($tableName)
    {
        $this->db = Application::$app->db;
        $this->query = $this->db->table($tableName);
    }

    public function all() // return all records
    {
        return $this->query->select()->fetchAll();
    }
    public function select($cols = ['*'])
    {
        $this->query->select($cols);
        return $this;
    }
    public function find(string $value, string $col = 'id') // return the record
    {
        return $this->query->select()->where($col, $value)->fetch();
    }
    public function findAll(string $value, string $col = 'id') // return the record
    {
        return $this->query->select()->where($col, $value)->fetchAll();
    }
    public function create(array $data) // make a new recorde 
    {
        return $this->query->insert($data)->exec();
    }
    public function delete($id)
    {
        return $this->query->delete()->where('id', $id)->exec();
    }
    public function where($va1, $val2, $operation = '=', $condition = "AND"): self
    {
        $this->query->where($va1, $val2, $operation, $condition);
        return $this;
    }
    public function get() // return all the filtered  records by where method
    {
        return $this->query->fetch();
    }
    public function getAll() // return all the filtered  records by where method
    {
        return $this->query->fetchAll();
    }
    public function update(array $data)
    {
        return $this->query->update($data)->exec();
    }
}
