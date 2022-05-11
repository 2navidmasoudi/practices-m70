<?php

use app\core\Application;

class m0002_add_password_column
{
    public function up()
    {
        $db = Application::$app->db;
        $query = "ALTER TABLE users ADD COLUMN password VARCHAR(255) NOT NULL;";
        $db->pdo->exec($query);
    }

    public function down()
    {
        $db = Application::$app->db;
        $query = "ALTER TABLE users DROP COLUMN password;";
        $db->pdo->exec($query);
    }
}
