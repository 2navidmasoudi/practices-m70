<?php

use app\core\Application;

class m0003_units
{
    public function up()
    {
        $db = Application::$app->db;
        $query =
            "CREATE TABLE units (
                id INT AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR(255) NOT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                uploaded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            ) ENGINE=INNODB;";
        $db->pdo->exec($query);
    }

    public function down()
    {
        $db = Application::$app->db;
        $query = "DROP TABLE units;";
        $db->pdo->exec($query);
    }
}
