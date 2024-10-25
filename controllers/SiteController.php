<?php
/**
 * Create By:  PhpStorm
 * Project:    Qovoq.local
 * Developer:  Shohrux
 * Date:       25.09.2024
 * Time:       20:11
 */

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;

/**
 * Class       SiteController
 *
 * @author     Shohrux
 * @package    app\controllers
 */
class SiteController extends Controller
{
    public function home()
    {
        $params = [
            'name' => "Guest",
            'title' => "Home Page",
        ];
//        return Application::$app->router->renderView('home', $params);
        return $this->render('home', $params);
    }

    public function contact()
    {
        $params = [
            'title' => "Contact Us", // Dinamik title
        ];
        return $this->render('contact', $params);
    }

    public function handleContact(Request $request)
    {
        $body = $request->getBody();
        echo '<pre>';
        var_dump($body);
        echo '</pre>';
        exit;

        return 'Handling submitted contact form';
    }

}