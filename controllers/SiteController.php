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
use app\core\Response;
use app\models\ContactForm;

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
        // Foydalanuvchini olish
        $user = Application::$app->user; // Foydalanuvchi obyekti

        // Agar foydalanuvchi tizimga kirgan bo'lsa, ismini olish
        if ($user) {
            $name = $user->getDisplayName(); // getDisplayName() metodini chaqirishingiz kerak
        } else {
            $name = "Guest"; // Agar foydalanuvchi kirmagan bo'lsa
        }

        $params = [
            'name' => $name,
            // Home sahifasida breadcrumb yo'q
            // 'breadcrumbs' => []  // Home sahifasida breadcrumb qo'shilmadi
//            'breadcrumbs' => [
//                'Home' => '/',
//            ],
        ];
//        return Application::$app->router->renderView('home', $params);
        return $this->render('home', $params);
    }

    public function contact(Request $request, Response $response)
    {
        $contact = new ContactForm();
        if ($request->isPost()) {
            $contact->loadData($request->getBody());
            if ($contact->validate() && $contact->send()) {
                Application::$app->session->setFlash('success', 'Your message has been sent.');
                return $response->redirect('/contact');
            }
        }
        return $this->render('contact', [
            'model' => $contact,
            'breadcrumbs' => [
                'Home' => '/',
                'Contact' => null,  // null bo'lsa, bu joriy sahifa
//                'Contact' => '/contact',
            ],
        ]);
    }

}