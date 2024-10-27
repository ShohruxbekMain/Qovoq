<?php
/**
 * Create By:  PhpStorm
 * Project:    Qovoq.local
 * Developer:  Shohrux
 * Date:       27.10.2024
 * Time:       0:22
 */

namespace app\core\exception;

/**
 * Class       NotFoundException
 *
 * @author     Shohrux
 * @package    app\core\exception
 */
class NotFoundException extends \Exception
{
    protected $message = 'Page not found';
    protected  $code = 404;
}