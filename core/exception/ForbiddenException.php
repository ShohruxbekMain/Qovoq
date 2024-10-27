<?php
/**
 * Create By:  PhpStorm
 * Project:    Qovoq.local
 * Developer:  Shohrux
 * Date:       27.10.2024
 * Time:       0:01
 */

namespace app\core\exception;

/**
 * Class       ForbiddenException
 *
 * @author     Shohrux
 * @package    app\core\exception
 */
class ForbiddenException extends \Exception
{
    protected $message = 'You don\'t have permission to access this page.';
    protected $code = 403;
}