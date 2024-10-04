<?php
/**
 * Create By:  PhpStorm
 * Project:    Qovoq.local
 * Developer:  Shohrux
 * Date:       28.09.2024
 * Time:       6:55
 */

namespace app\models;

use app\core\Model;

/**
 * Class       RegisterModel
 *
 * @author     Shohrux
 * @package    app\models
 */
class RegisterModel extends Model
{
    public string $firstname = '';
    public string $lastname = '';
    public string $email = '';
    public string $password = '';
    public string $confirmPassword = '';
    public bool $termsAccepted = false;
    public function register()
    {
        echo "Creating new user";
    }

    public function rules(): array
    {
        return [
            'firstname' => [self::RULE_REQUIRED],
            'lastname' => [self::RULE_REQUIRED],
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
            'password' => [self::RULE_REQUIRED,[self::RULE_MIN, 'min' => 8],[self::RULE_MAX, 'max' => 24]],
            'confirmPassword' => [self::RULE_REQUIRED, [self::RULE_MATCH, 'match' => 'password']],
//            'termsAccepted' => [self::RULE_REQUIRED, self::RULE_TERMS],
            'termsAccepted' => [self::RULE_TERMS],
        ];
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

}