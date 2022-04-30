<?php

namespace Connection;

interface ConnectionInterface
{
    public static function getInstance();
    public function getConnection();
}
