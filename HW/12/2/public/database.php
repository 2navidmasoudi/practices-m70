<?php

function getConfig()
{
    if (file_exists(__DIR__ . '/../config.json'))
        $file = file_get_contents(__DIR__ . '/../config.json');
    elseif (file_exists(__DIR__ . '/../../config.json'))
        $file = file_get_contents(__DIR__ . '/../../config.json');
    return json_decode($file);
}

function db_mode()
{
    $data = getConfig();
    return $data->database;
}

function connect()
{
    global $pdo;
    $data = getConfig();
    $driver_options = array(
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    );
    $dns = "{$data->driver}:host={$data->host};dbname={$data->dbname}";
    $pdo = new PDO(
        $dns,
        $data->username,
        $data->password,
        $driver_options,
    );
}

if (db_mode()) {
    connect();
}
