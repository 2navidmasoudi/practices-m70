<?php

use app\core\Application;

class m0006_patients
{
    public function up()
    {
        $db = Application::$app->db;
        $query =
            "CREATE TABLE patients (
                id INT AUTO_INCREMENT PRIMARY KEY,
                username VARCHAR(255) NOT NULL,
                password VARCHAR(255) NOT NULL,
                firstname VARCHAR(255),
                lastname VARCHAR(255),
                phone VARCHAR(255),
                email VARCHAR(255),
                national_code VARCHAR(255),
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                uploaded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                picture_id INT,
                FOREIGN KEY (picture_id) REFERENCES pictures(id)
                -- FOREIGN KEY (treat_history_id) REFERENCES treat_histories(id)
            ) ENGINE=INNODB;";
        $db->pdo->exec($query);
    }

    public function down()
    {
        $db = Application::$app->db;
        $query = "DROP TABLE patients;";
        $db->pdo->exec($query);
    }
}
