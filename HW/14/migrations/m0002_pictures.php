<?php

use app\core\Application;

class m0002_pictures
{
    public function up()
    {
        $db = Application::$app->db;
        $query =
            "CREATE TABLE pictures (
                id INT AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR(255) NOT NULL,
                img LONGBLOB NOT NULL,
                uploaded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            ) ENGINE=INNODB;";
        $db->pdo->exec($query);
    }

    public function down()
    {
        $db = Application::$app->db;
        $query = "DROP TABLE pictures";
        $db->pdo->exec($query);
    }
}
