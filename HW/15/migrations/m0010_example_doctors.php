<?php

use app\core\Application;

class m0010_example_doctors
{
    public function up()
    {
        $db = Application::$app->db;
        $query =
            "INSERT INTO doctors (
                username, password, status,
                firstname, lastname, visit_price,
                unit_id, address, phone,
                instagram, twitter, blog)
            VALUES
            ('Navid', '1234', 1,
            'Navid', 'Masoudi', '9999999',
            4, 'tehran, kheyli door', '09106255595',
            '@2navidmasoudi', 'navidmsd', NULL
            ),
            ('MrM', '1234', 1,
            'Mamad', 'Khosravi', '150',
            3, 'Boshehr', '09121111111',
            '@mamadkhosravizadegan', NULL, 'mamad.ir'
            ),
            ('Amin', '1234', 1,
            'Amin', 'Abpeykar', '500',
            4, 'tehran, Nazdike meydon', '09121234567',
            '@aminabpeykar', 'darkiller', 'bestlolplayers.com/aminabpeykar'
            );";
        $db->pdo->exec($query);
    }

    public function down()
    {
        $db = Application::$app->db;
        $query = "DELETE FROM doctors;";
        $db->pdo->exec($query);
    }
}
