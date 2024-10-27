<?php
/**
 * Create By:  PhpStorm
 * Project:    Qovoq.local
 * Developer:  Shohrux
 * Date:       26.10.2024
 * Time:       23:50
 */

namespace app\core\middlewares;

/**
 * Class       BaseMiddleware
 *
 * @author     Shohrux
 * @package    app\core\middlewares
 */
abstract class BaseMiddleware
{
    abstract public function execute();
}