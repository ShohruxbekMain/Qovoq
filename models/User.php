<?php
/**
 * Create By:  PhpStorm
 * Project:    Qovoq.local
 * Developer:  Shohrux
 * Date:       28.09.2024
 * Time:       6:55
 */

namespace app\models;

use app\core\Application;
use app\core\UserModel;

/**
 * Class       RegisterModel
 *
 * @author     Shohrux
 * @package    app\models
 */
class User extends UserModel
{
    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;
    const STATUS_DELETED = 2;


    public string $firstname = '';
    public string $lastname = '';
    public string $email = '';
    public int $status = self::STATUS_INACTIVE;
    public string $password = '';
    public string $confirmPassword = '';
    public bool $termsAccepted = false;

    public function tableName(): string
    {
        return 'users';
    }

    public static function primaryKey(): string
    {
        return 'id';
    }

    public function save()
    {
        $this->status = self::STATUS_INACTIVE;
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        return parent::save();
    }

    public function rules(): array
    {
        return [
            'firstname' => [self::RULE_REQUIRED],
            'lastname' => [self::RULE_REQUIRED],
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL, [
                self::RULE_UNIQUE, 'class' => self::class
            ]],
            'password' => [
                self::RULE_REQUIRED,
                [self::RULE_MIN, 'min' => 8],
                [self::RULE_MAX, 'max' => 24],
                self::RULE_LOWERCASE, // Kichik harf kerak
                self::RULE_CAPITAL,   // Katta harf kerak
                self::RULE_NUMBER,    // Raqam kerak
                self::RULE_SPECIAL    // Maxsus belgi kerak
            ],
            'confirmPassword' => [self::RULE_REQUIRED, [self::RULE_MATCH, 'match' => 'password']],
//            'termsAccepted' => [self::RULE_REQUIRED, self::RULE_TERMS],
            'termsAccepted' => [self::RULE_TERMS],
        ];
    }

    public function attributes(): array
    {
        return ['firstname', 'lastname', 'email', 'password', 'status'];
    }


    public function labels(): array
    {
        return [
            'firstname' => 'First Name',
            'lastname' => 'Last Name',
            'email' => 'Email Address',
            'password' => 'Password',
            'confirmPassword' => 'Confirm Password',
            'termsAccepted' => "I have read and agree to the <a href='/terms' target='_blank'>Terms</a> and <a href='/conditions' target='_blank'>Conditions</a>"
        ];
    }

    public function getDisplayName(): string
    {
        return $this->firstname . ' ' . $this->lastname;
    }

    public function emailExists($email): bool
    {
        $stmt = Application::$app->db->prepare("SELECT * FROM " . $this->tableName() . " WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->rowCount() > 0;
    }


}