<?php

use app\core\Application;

class m0004_works
{
    public function up()
    {
        $db = Application::$app->db;
        $query =
            "CREATE TABLE works (
                id INT AUTO_INCREMENT PRIMARY KEY,
                day VARCHAR(255) NOT NULL,
                from_hour TIME NOT NULL,
                to_hour TIME NOT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                uploaded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            ) ENGINE=INNODB;";
        $db->pdo->exec($query);
    }

    public function down()
    {
        $db = Application::$app->db;
        $query = "DROP TABLE works;";
        $db->pdo->exec($query);
    }
}
