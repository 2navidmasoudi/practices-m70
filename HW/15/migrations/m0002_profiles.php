<?php

use app\core\Application;

class m0002_profiles
{
    public function up()
    {
        $db = Application::$app->db;
        $query =
            "CREATE TABLE profiles (
                id INT AUTO_INCREMENT PRIMARY KEY,
                user_id INT NOT NULL,
                firstname VARCHAR(255),
                lastname VARCHAR(255),
                phone VARCHAR(255),
                email VARCHAR(255),
                national_code VARCHAR(255),
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                uploaded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                FOREIGN KEY (user_id) REFERENCES users(id)
            ) ENGINE=INNODB;";
        $db->pdo->exec($query);
    }

    public function down()
    {
        $db = Application::$app->db;
        $query = "DROP TABLE profiles";
        $db->pdo->exec($query);
    }
}
