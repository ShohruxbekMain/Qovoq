<?php
/**
 * Create By:  PhpStorm
 * Project:    Qovoq.local
 * Developer:  Shohrux
 * Date:       26.10.2024
 * Time:       1:34
 */

namespace app\core;

use app\core\db\DbModel;

/**
 * Class       UserModel
 *
 * @author     Shohrux
 * @package    app\core
 */
abstract  class UserModel extends DbModel
{
    abstract public function getDisplayName(): string;
}