<?php

use app\core\Application;

class m0009_example_units
{
    public function up()
    {
        $db = Application::$app->db;
        $query =
            "INSERT INTO units (name)
            VALUES
             ('گوش و حلق و بینی'), -- 1
             ('قلب و عروق'), -- 2
             ('عمومی'), -- 3
             ('اورژانس'), -- 4
             ('اطفال'), -- 5
             ('زنان و زایمان'), -- 6
             ('تغذیه'); -- 7";
        $db->pdo->exec($query);
    }

    public function down()
    {
        $db = Application::$app->db;
        $query = "DELET FROM units;";
        $db->pdo->exec($query);
    }
}
