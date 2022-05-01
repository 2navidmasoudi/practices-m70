<?php

namespace Connection;

use PDO;

interface ConnectionInterface
{
    public static function getInstance();
    public function getConnection(): PDO;
}
