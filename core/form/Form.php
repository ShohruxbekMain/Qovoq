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
 * Class: Form
 *
 * @author     Shohrux
 * @package    app\core\form
 */
class Form
{

    public static function begin($action, $method)
    {
        echo sprintf('<form action="%s" method="%s" enctype="multipart/form-data">', $action, $method);
        return new Form();
    }

    public function field(Model $model, $attribute): InputField
    {
        return new InputField($model, $attribute);
    }

      public function fieldTextarea(Model $model, $attribute): TextareaField
    {
        return new TextareaField($model, $attribute);
    }

    public static function end()
    {
        echo '</form>';
    }

}
