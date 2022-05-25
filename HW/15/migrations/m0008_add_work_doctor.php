<?php

use app\core\Application;

class m0008_add_work_doctor
{
    public function up()
    {
        $db = Application::$app->db;
        $query =
            "ALTER TABLE works
                ADD COLUMN doctor_id INT;
            ALTER TABLE works
                ADD CONSTRAINT fk_doctor_id
                FOREIGN KEY (doctor_id) REFERENCES doctors(id);";
        $db->pdo->exec($query);
    }

    public function down()
    {
        $db = Application::$app->db;
        $query =
            "ALTER TABLE works 
                DROP FOREIGN KEY fk_doctor_id;
            ALTER TABLE works
                DROP COLUMN doctor_id;";
        $db->pdo->exec($query);
    }
}
