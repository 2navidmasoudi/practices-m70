<?php

use app\core\Application;

class m0004_doctors
{
    public function up()
    {
        $db = Application::$app->db;
        $query =
            "CREATE TABLE doctors (
                id INT AUTO_INCREMENT PRIMARY KEY,
                user_id INT NOT NULL,
                unit_id INT,
                twitter VARCHAR(255),
                blog VARCHAR(255),
                address TEXT,
                national_code VARCHAR(255),
                educations TEXT,
                medical_code VARCHAR(255),
                experience TEXT,
                visit_price BIGINT,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                uploaded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                FOREIGN KEY (user_id) REFERENCES users(id),
                FOREIGN KEY (unit_id) REFERENCES units(id)
            ) ENGINE=INNODB;";
        $db->pdo->exec($query);
    }

    public function down()
    {
        $db = Application::$app->db;
        $query = "DROP TABLE doctors;";
        $db->pdo->exec($query);
    }
}
