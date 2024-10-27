<?php
/**
 * Create By:  PhpStorm
 * Project:    Qovoq.local
 * Developer:  Shohrux
 * Date:       01.10.2024
 * Time:       14:18
 */

namespace app\core\form;

use app\core\Model;

/**
 * Class: Field
 *
 * @author     Shohrux
 * @package    app\core\form
 */
class InputField extends BaseField
{

    public string $type;

    public function __construct(Model $model, string $attribute)
    {
        $this->type = self::TYPE_TEXT;
        parent::__construct($model, $attribute);
    }

    public function passwordField(): InputField
    {
        $this->type = self::TYPE_PASSWORD;
        $this->autocomplete = self::TYPE_AUTOCOMPLETE_NEW_PASSWORD;
        return $this;
    }

    public function passwordShowField(): InputField
    {
        $this->passShow = self::TYPE_IS_PASSWORD;
        return $this;
    }

    public function confirmPasswordShowField(): InputField
    {
        $this->passShow = self::TYPE_IS_CONFIRM_PASSWORD;
        return $this;
    }

    public function passwordHelpAreaField(): InputField
    {
        // Qoidalar asosida min va max qiymatlarini olish
        $minRule = $this->model->getRuleParams($this->attribute, Model::RULE_MIN);
        $maxRule = $this->model->getRuleParams($this->attribute, Model::RULE_MAX);

        // Agar min va max qiymatlari mavjud bo'lsa, ularni TYPE_PASSWORD_HELP_BLOCK ichiga joylashtiramiz
        $minValue = $minRule['min'] ?? '8';  // Default qiymat: 8
        $maxValue = $maxRule['max'] ?? '24'; // Default qiymat: 24

        // {min} va {max} qiymatlarini form-text blokiga qo‘shish
        $this->passHelpAreaBlock = str_replace(
            ['{min}', '{max}'],
            [$minValue, $maxValue],
            self::TYPE_PASSWORD_HELP_BLOCK
        );

        // Aria atributini qo'shamiz
        $this->passHelpAreaGen = self::TYPE_PASSWORD_HELP_BLOCK_GEN;
        return $this;
    }

    public function emailField(): InputField
    {
        $this->type = self::TYPE_EMAIL;
        return $this;
    }

    public function checkBox(): InputField
    {
        $this->genClass = self::TYPE_GEN_CHECKBOX_CLASS;
        $this->inputClass = self::TYPE_CHECKBOX_CLASS;
        $this->type = self::TYPE_CHECKBOX;
        return $this;
    }

    public function initialValue(): InputField
    {
        $this->model->{$this->attribute} = self::INITIAL_VALUE;
        return $this;
    }

    public function reminder($value = null): InputField
    {
        $this->model->{$this->attribute} = $value;
        return $this;
    }

    public function renderInput(): string
    {
        return sprintf('<input %s type="%s" name="%s" value="%s" class="%s %s" id="%s" placeholder="%s" %s >',
            $this->autocomplete,
            $this->type,
            $this->attribute,
            $this->model->{$this->attribute}, // Xavfsiz kodlash
            $this->inputClass,
            $this->model->hasError($this->attribute) ? ' is-invalid' : ' ',
            $this->attribute,
            $this->attribute,
            $this->passHelpAreaGen,
        );
    }
}