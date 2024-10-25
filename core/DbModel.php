<?php
/**
 * Create By:  PhpStorm
 * Project:    Qovoq.local
 * Developer:  Shohrux
 * Date:       11.10.2024
 * Time:       20:46
 */

namespace app\core;

/**
 * Class       DbModel
 *
 * @author     Shohrux
 * @package    app\core
 */
abstract class DbModel extends Model
{
    abstract public function tableName(): string;

    abstract public function attributes(): array;

    public function save()
    {
        // 1. Jadval nomini
        $tableName = $this->tableName();

        // 2. Atributlar ro'yxati
        $attributes = $this->attributes();

        // 3. Har bir atribut uchun parametrlar
        $params = array_map(fn($attr) => ":$attr", $attributes);

        // 4. SQL so'rovi
        $sql = "INSERT INTO $tableName (" . implode(',', $attributes) . ") 
                VALUES (" . implode(',', $params) . ")";

        // 5. Tayyorlangan so'rovni bajarish
        $statement = self::prepare($sql);

        // 6. Atributlar qiymatlarini parametrlar bilan bog'lash
        foreach ($attributes as $attribute) {
            $statement->bindValue(":$attribute", $this->{$attribute});
        }

        $statement->execute();

        return true;

    }

    public static function prepare($sql)
    {
        return Application::$app->db->pdo->prepare($sql);
    }
}