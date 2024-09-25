<?php
/**
 * Create By:  PhpStorm
 * Project:    Qovoq.local
 * Developer:  Shohrux
 * Date:       26.09.2024
 * Time:       1:31
 */

namespace app\controllers;

use app\core\Controller;
use app\core\Request;

/**
 * Class       AuthController
 *
 * @author     Shohrux
 * @package    app\controllers
 */
class AuthController extends Controller
{
    public function login()
    {
        $this->setLayout('auth');
        return $this->render('login');
    }

    public function register(Request $request)
    {
        if ($request->isPost()) {
            return 'Handle submitted data';
        }
        $this->setLayout('auth');
        return $this->render('register');
    }
}