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
    public const  TYPE_GEN_INPUT_CLASS =  'form-floating';
    public const  TYPE_INPUT_CLASS =  'form-control';
    public const  TYPE_GEN_CHECKBOX_CLASS =  'form-check';
    public const  TYPE_CHECKBOX_CLASS =  'form-check-input';


    public Model $model;
    public string $type;
    public string $genClass;
    public string $inputClass;
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
        $this->model = $model;
        $this->attribute = $attribute;
    }
    public function __toString()
    {
        return sprintf('
        <div class="%s mb-3">
            <input type="%s" name="%s" value="%s" class="%s %s" id="%s" placeholder="%s" >
            <label for="%s">%s</label>
            
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
            $this->attribute,
            $this->model->getLabel($this->attribute),
            $this->model->getFirstError($this->attribute)
        );
    }
    public function passwordField(): Field
    {
        $this->type = self::TYPE_PASSWORD;
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