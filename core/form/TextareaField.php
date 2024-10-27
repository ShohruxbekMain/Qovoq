<?php
/**
 * Create By:  PhpStorm
 * Project:    Qovoq.local
 * Developer:  Shohrux
 * Date:       27.10.2024
 * Time:       3:24
 */

namespace app\core\form;

/**
 * Class       TextareaField
 *
 * @author     Shohrux
 * @package    app\core\form
 */
class TextareaField extends BaseField
{

    public string $inputClass;

    public function renderInput(): string
    {
        return sprintf('<textarea name="%s" class="%s%s" placeholder="Leave a comment here" id="floatingTextarea" style="height: 100px">%s</textarea>',
            $this->attribute,
            htmlspecialchars($this->inputClass, ENT_QUOTES),
            htmlspecialchars($this->model->hasError($this->attribute) ? ' is-invalid' : ' ', ENT_QUOTES),
            $this->model->{$this->attribute}
        );
    }
}