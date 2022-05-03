<?php

namespace Database;

use Connection\ConnectionInterface;
use PDO;

class MySqlDatabase implements DatabaseInterface
{
    private PDO $db;
    private string $table;
    private string $query;

    public function __construct(ConnectionInterface $connection)
    {
        $this->db = $connection->getConnection();
    }
    public function table(string $table): DatabaseInterface
    {
        $this->table = $table;
        return $this;
    }
    public function select(array $cols = ['*']): DatabaseInterface
    {
        $this->cols = $cols;
        $this->query =
            "SELECT " . implode(",", $cols) .
            " FROM " . $this->table;
        return $this;
    }
    public function insert(array $fields): DatabaseInterface
    {
        $this->insert = $fields;

        $values = array_map(fn ($v) => "'$v'", array_values($fields));
        $this->query =
            "INSERT INTO " . $this->table .
            "(" . implode(",", array_keys($fields)) . ") " .
            "VALUES (" . implode(",", $values) . ")";

        return $this;
    }
    public function update(array $fields): DatabaseInterface
    {
        $this->update = $fields;
        // $fields = ["name" => "shappare", "age" => 5];
        // "UPDATE Students SET name = 'shappare',age = '5'";
        $arr = array_map(
            fn ($key, $value) => "$key = '$value'",
            array_keys($fields),
            array_values($fields),
        );

        $this->query = "UPDATE " . $this->table . " SET " . implode(",", $arr);

        return $this;
    }
    public function where(string $val1, string $val2, string $operation = '='): DatabaseInterface
    {
        $this->where = [
            $val1, $val2, $operation
        ];

        // NOTE: WE CAN ADD OR WHERE 
        // NOTE: WE CAN ADD AND WHERE
        $this->query .= " WHERE $val1 $operation '$val2'";
        return $this;
    }
    public function prepare()
    {
    }
    public function fetch()
    {
        return $this->db->query($this->query)->fetch(PDO::FETCH_OBJ);
    }
    public function fetchAll()
    {
        return $this->db->query($this->query)->fetchAll(PDO::FETCH_OBJ);
    }
    public function exec(): bool
    {
        return $this->db->exec($this->query);
    }
}
