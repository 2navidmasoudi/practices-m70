<?php

use app\core\Application;

class m0011_example_works
{
    public function up()
    {
        $db = Application::$app->db;
        $query =
            "INSERT INTO works (day, from_hour, to_hour, doctor_id)
            VALUES
             ('شنبه', '10:00:00', '14:00:00', 1),
             ('یکشنبه', '13:00:00', '16:00:00', 1),
             ('دوشنبه', '10:00:00', '14:00:00', 2),
             ('سه شنبه', '10:00:00', '14:00:00', 2),
             ('جمعه', '10:00:00', '14:00:00', 2),
             ('جمعه', '22:00:00', '24:00:00', 3);";
        $db->pdo->exec($query);
    }

    public function down()
    {
        $db = Application::$app->db;
        $query = "DELET FROM works;";
        $db->pdo->exec($query);
    }
}
