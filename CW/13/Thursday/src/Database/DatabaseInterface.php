<?php

namespace Database;

use Connection\ConnectionInterface;

interface DatabaseInterface
{
    public function __construct(ConnectionInterface $connection);
    public function table(string $table): DatabaseInterface;
    public function select(array $cols = ['*']): DatabaseInterface;
    public function insert(array $fields): DatabaseInterface;
    public function update(array $fields): DatabaseInterface;
    public function where(string $val1, string $val2, string $operation = '='): DatabaseInterface;
    public function fetch();
    public function fetchAll();
    public function exec(): bool;
}
