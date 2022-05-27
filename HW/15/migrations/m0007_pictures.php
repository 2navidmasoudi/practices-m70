<?php

use app\core\Application;

class m0007_pictures
{
    public function up()
    {
        $db = Application::$app->db;
        $query =
            "CREATE TABLE pictures (
                id INT AUTO_INCREMENT PRIMARY KEY,
                profile_id INT NOT NULL,
                name VARCHAR(255) NOT NULL,
                img LONGBLOB NOT NULL,
                uploaded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                FOREIGN KEY (profile_id) REFERENCES profiles(id)
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
