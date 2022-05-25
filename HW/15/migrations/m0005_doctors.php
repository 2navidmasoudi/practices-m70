<?php

use app\core\Application;

class m0005_doctors
{
    public function up()
    {
        $db = Application::$app->db;
        $query =
            "CREATE TABLE doctors (
                id INT AUTO_INCREMENT PRIMARY KEY,
                username VARCHAR(255) NOT NULL,
                password VARCHAR(255) NOT NULL,
                status TINYINT NOT NULL DEFAULT 0,
                firstname VARCHAR(255),
                lastname VARCHAR(255),
                phone VARCHAR(255),
                email VARCHAR(255),
                instagram VARCHAR(255),
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
                picture_id INT,
                unit_id INT,
                FOREIGN KEY (picture_id) REFERENCES pictures(id),
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
