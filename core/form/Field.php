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

    public const TYPE_IS_PASSWORD = '<div class="position-absolute z-3 border-end border-1 border-secondary-subtle d-flex align-items-center justify-content-between password-showhide" style="width: 54px; height: 54px; top: 2px; left:2px; cursor:pointer;">
        <span class="bx bx-show bx-sm h-100 w-100 align-items-center justify-content-center show-password" style="color:#aaa;"></span>
        <span class="bx bx-hide bx-sm h-100 w-100 align-items-center justify-content-center hide-password" style="color:#aaa;"></span>
        </div>' ;
    public const TYPE_IS_CONFIRM_PASSWORD = '<div class="position-absolute z-3 border-end border-1 border-secondary-subtle d-flex align-items-center justify-content-between password-showhide" style="width: 54px; height: 54px; top: 2px; left:2px; cursor:pointer;">
        <span class="bx bx-show bx-sm h-100 w-100 align-items-center justify-content-center show-confirm-password" style="color:#aaa;"></span>
        <span class="bx bx-hide bx-sm h-100 w-100 align-items-center justify-content-center hide-confirm-password" style="color:#aaa;"></span>
        </div>';
    public const TYPE_IS_NOT_PASSWORD = '';
    public const TYPE_PASSWORD_HELP_BLOCK_GEN_NO = '';
    public const TYPE_PASSWORD_HELP_BLOCK_GEN = 'aria-describedby="passwordHelpBlock"';

    public const TYPE_AUTOCOMPLETE_ON = 'autocomplete="on"';
    public const TYPE_AUTOCOMPLETE_OFF = 'autocomplete="off"';
    public const TYPE_AUTOCOMPLETE_NEW_PASSWORD = 'autocomplete="new-password" data-1p-ignore data-bwignore data-lpignore="true" data-form-type="other"';


    public Model $model;
    public string $type;
    public string $genClass;
    public string $inputClass;
    public string $passHelpAreaGen;
    public string $passHelpAreaBlock;
    public string $passShow;
    public string $attribute;
    public string $autocomplete;


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
        $this->passShow = self::TYPE_IS_NOT_PASSWORD;
        $this->model = $model;
        $this->attribute = $attribute;
        $this->autocomplete = self::TYPE_AUTOCOMPLETE_ON;
    }

    public function __toString()
    {
        return sprintf('
        <div class="%s mb-4">
            <input %s type="%s" name="%s" value="%s" class="%s %s" id="%s" placeholder="%s" %s >
            %s
            <label for="%s">%s</label>
            <div class="invalid-feedback">
                %s
            </div>
            %s
        </div>
        ',
            htmlspecialchars($this->genClass, ENT_QUOTES), // Xavfsiz kodlash
            htmlspecialchars($this->autocomplete, ENT_QUOTES),
            htmlspecialchars($this->type, ENT_QUOTES),
            htmlspecialchars($this->attribute, ENT_QUOTES),
            htmlspecialchars($this->model->{$this->attribute}, ENT_QUOTES), // Xavfsiz kodlash
            htmlspecialchars($this->inputClass, ENT_QUOTES),
            htmlspecialchars($this->model->hasError($this->attribute) ? ' is-invalid' : ' ', ENT_QUOTES),
            htmlspecialchars($this->attribute, ENT_QUOTES),
            htmlspecialchars($this->attribute, ENT_QUOTES),
            htmlspecialchars($this->passHelpAreaGen, ENT_QUOTES),

            $this->passShow,

            htmlspecialchars($this->attribute, ENT_QUOTES),
            $this->model->getLabel($this->attribute), // Xavfsiz kodlash
            htmlspecialchars($this->model->getFirstError($this->attribute), ENT_QUOTES), // Xavfsiz kodlash
            $this->passHelpAreaBlock // Xavfsiz kodlash
        );
    }

    public function passwordField(): Field
    {
        $this->type = self::TYPE_PASSWORD;
        $this->autocomplete = self::TYPE_AUTOCOMPLETE_NEW_PASSWORD;
        return $this;
    }

    public function passwordShowField(): Field
    {
        $this->passShow = self::TYPE_IS_PASSWORD;
        return $this;
    }

    public function confirmPasswordShowField() : Field
    {
        $this->passShow = self::TYPE_IS_CONFIRM_PASSWORD;
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