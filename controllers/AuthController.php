<?php
/**
 * Create By:  PhpStorm
 * Project:    Qovoq.local
 * Developer:  Shohrux
 * Date:       26.09.2024
 * Time:       1:31
 */

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Model;
use app\core\Request;
use app\models\User;

/**
 * Class       AuthController
 *
 * @author     Shohrux
 * @package    app\controllers
 */
class AuthController extends Controller
{
    private User $userModel;

    public function __construct()
    {
        $this->userModel = new User();
    }

    public function checkEmail()
    {
//        // CSRF tokenini tekshirish
//        if (empty($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
//            echo json_encode(['status' => 'error', 'message' => 'Invalid CSRF token']);
//            return; // Agar token noto'g'ri bo'lsa, chiqamiz
//        }

        // Emailni tekshirish
        if (empty($_POST['email'])) {
            // Agar email kiritilmasa, xato xabarini qaytarish
            echo json_encode(['status' => 'error', 'message' => 'Email not provided']);
            return; // Dastlabki xato xabari bilan chiqamiz
        }

        $email = $_POST['email'];

        // Email mavjudligini tekshirish
        if ($this->userModel->emailExists($email)) {
            // Email mavjud bo'lsa, xato xabarini qaytarish
            $this->userModel->addError('email', User::RULE_UNIQUE); // Xato xabarini qo'shish
            echo json_encode([
                'status' => 'error',
                'message' => $this->userModel->getFirstError('email') // Xato xabarini olish
            ]);
        } else {
            echo json_encode(['status' => 'success']);
        }
    }

    public function login()
    {
        $this->setLayout('auth');
        return $this->render('login', [
            'title' => 'Login / Sign In'  // Dinamik title
        ]);
    }

    public function register(Request $request)
    {
        $user = new User();
        if ($request->isPost()) {
            $user->loadData($request->getBody());

            if ($user->validate() && $user->save()) {
                Application::$app->session->setFlash('success', 'Thanks for signing up!');
                Application::$app->response->redirect('/');
                exit;
            }
            return $this->render('register', [
                'model' => $user,
                'title' => 'Create an account / Sign up' // Dinamik title
            ]);
        }

        $this->setLayout('auth');
        return $this->render('register', [
            'model' => $user,
            'title' => 'Create an account / Sign up' // Dinamik title
        ]);
    }
}