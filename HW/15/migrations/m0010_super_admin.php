<?php

use app\core\Application;

class m0010_super_admin
{
    public function up()
    {
        $db = Application::$app->db;
        $query =
            "INSERT INTO users (username, password, status, role)
            VALUES('admin', 'admin', 1, 'admin');";
        $db->pdo->exec($query);
    }

    public function down()
    {
        $db = Application::$app->db;
        $query = "DELETE FROM users;";
        $db->pdo->exec($query);
    }
}
