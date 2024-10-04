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
class Field
{

    public const INITIAL_VALUE = '';
    public const TYPE_TEXT = 'text';
    public const TYPE_PASSWORD = 'password';
    public const TYPE_EMAIL = 'email';
    public const TYPE_NUMBER = 'number';
    public const TYPE_DATE = 'date';
    public const TYPE_DATETIME = 'datetime';
    public const TYPE_CHECKBOX = 'checkbox';
    public const TYPE_RADIO = 'radio';
    public const TYPE_SELECT = 'select';
    public const TYPE_FILE = 'file';
    public const TYPE_IMAGE = 'image';
    public const TYPE_MULTIPLE = 'multiple';
    public const TYPE_MULTIPLE_SELECT = 'multiple-select';
    public const TYPE_RADIO_SELECT = 'radio-select';
    public const TYPE_CHECKBOX_SELECT = 'checkbox-select';

    //    Class names
    public const  TYPE_GEN_INPUT_CLASS = 'form-floating';
    public const  TYPE_INPUT_CLASS = 'form-control';
    public const  TYPE_GEN_CHECKBOX_CLASS = 'form-check';
    public const  TYPE_CHECKBOX_CLASS = 'form-check-input';

    public const TYPE_PASSWORD_HELP_BLOCK_NO = '';

    public const TYPE_PASSWORD_HELP_BLOCK = '<div id="passwordHelpBlock" class="form-text">
                Your password must be {min}-{max} characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.
            </div>';
    public const TYPE_PASSWORD_HELP_BLOCK_GEN_NO = '';
    public const TYPE_PASSWORD_HELP_BLOCK_GEN = 'aria-describedby="passwordHelpBlock"';


    public Model $model;
    public string $type;
    public string $genClass;
    public string $inputClass;
    public string $passHelpAreaGen;
    public string $passHelpAreaBlock;
    public string $attribute;


    /**
     * @param Model $model
     * @param string $attribute
     */
    public function __construct(Model $model, string $attribute)
    {
        $this->type = self::TYPE_TEXT;
        $this->genClass = self::TYPE_GEN_INPUT_CLASS;
        $this->inputClass = self::TYPE_INPUT_CLASS;
        $this->passHelpAreaGen = self::TYPE_PASSWORD_HELP_BLOCK_GEN_NO;
        $this->passHelpAreaBlock = self::TYPE_PASSWORD_HELP_BLOCK_NO;
        $this->model = $model;
        $this->attribute = $attribute;
    }

    public function __toString()
    {
        return sprintf('
        <div class="%s mb-4">
            <input type="%s" name="%s" value="%s" class="%s %s" id="%s" placeholder="%s" %s>
            <label for="%s">%s</label>
            %s
            <div class="invalid-feedback">
                %s
            </div>
        </div>
        ',
            $this->genClass,
            $this->type,
            $this->attribute,
            $this->model->{$this->attribute},
            $this->inputClass,
            $this->model->hasError($this->attribute) ? ' is-invalid' : ' ',
            $this->attribute,
            $this->attribute,
            $this->passHelpAreaGen,
            $this->attribute,
            $this->model->getLabel($this->attribute),
            $this->passHelpAreaBlock,
            $this->model->getFirstError($this->attribute)
        );
    }

    public function passwordField(): Field
    {
        $this->type = self::TYPE_PASSWORD;
        return $this;
    }

    public function passwordHelpAreaField(): Field
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

    public function emailField(): Field
    {
        $this->type = self::TYPE_EMAIL;
        return $this;
    }

    public function checkBox(): Field
    {
        $this->genClass = self::TYPE_GEN_CHECKBOX_CLASS;
        $this->inputClass = self::TYPE_CHECKBOX_CLASS;
        $this->type = self::TYPE_CHECKBOX;
        return $this;
    }

    public function initialValue(): Field
    {
        $this->model->{$this->attribute} = self::INITIAL_VALUE;
        return $this;
    }

}