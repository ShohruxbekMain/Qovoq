<?php
/**
 * Create By:  PhpStorm
 * Project:    Qovoq.local
 * Developer:  Shohrux
 * Date:       27.10.2024
 * Time:       1:28
 */

namespace app\models;

use app\core\Model;

/**
 * Class       ContactForm
 *
 * @author     Shohrux
 * @package    app\models
 */
class ContactForm extends Model
{
    public string $subject = '';
    public string $email = '';
    public string $body = '';

    public function rules(): array
    {
        return [
            'subject' => [self::RULE_REQUIRED],
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
            'body' => [self::RULE_REQUIRED],
        ];
    }

    public function labels(): array
    {
        return [
            'subject' => 'Enter Your Subject',
            'email' => 'Enter Your Email',
            'body' => 'Enter Your Message',
        ];
    }

    public function send()
    {
        return true;
    }

}