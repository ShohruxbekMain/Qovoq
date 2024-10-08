<?php

use app\core\Application;

/**
 * Create By:  PhpStorm
 * Project:    Qovoq.local
 * Developer:  Shohrux
 * Date:       08.10.2024
 * Time:       14:08
 */

class m0002_add_password_column
{
    public function up()
    {
        $db = Application::$app->db;
        $db->pdo->exec("ALTER TABLE users ADD COLUMN password VARCHAR(512) NOT NULL ");
    }
    public function down()
    {
        $db = Application::$app->db;
        $db->pdo->exec("ALTER TABLE users DROP COLUMN password");
    }
}