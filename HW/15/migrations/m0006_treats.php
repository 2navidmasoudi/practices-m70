<?php

use app\core\Application;

class m0006_treats
{
    public function up()
    {
        $db = Application::$app->db;
        $query =
            "CREATE TABLE treats (
                id INT AUTO_INCREMENT PRIMARY KEY,
                description VARCHAR(255),
                reserved TINYINT NOT NULL DEFAULT 1,
                work_id INT NOT NULL,
                doctor_id INT NOT NULL,
                user_id INT NOT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                uploaded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                FOREIGN KEY (work_id) REFERENCES works(id),
                FOREIGN KEY (doctor_id) REFERENCES doctors(id),
                FOREIGN KEY (user_id) REFERENCES users(id)
            ) ENGINE=INNODB;";
        $db->pdo->exec($query);
    }

    public function down()
    {
        $db = Application::$app->db;
        $query = "DROP TABLE treats;";
        $db->pdo->exec($query);
    }
}
