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
use app\core\middlewares\AuthMiddleware;
use app\core\Model;
use app\core\Request;
use app\core\Response;
use app\models\LoginForm;
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
        $this->registerMiddleware(new AuthMiddleware(['profile']));
        $this->userModel = new User();
    }


    public function login(Request $request, Response $response)
    {

        // Agar foydalanuvchi allaqachon tizimga kirgan bo'lsa
        if (Application::$app->isLoggedIn()) {
            Application::$app->session->setFlash('success', 'You are already logged in!');
            $response->redirect('/');
            return;
        }

        $loginForm = new LoginForm();
        if ($request->isPost()) {
            $loginForm->loadData($request->getBody());

            // Agar "Remember Me" checkboxi belgilangan bo'lsa
            if (isset($request->getBody()['remember'])) {
                // Cookie yaratish: 30 kun davomida saqlanadi
                setcookie("user_login", $loginForm->email, time() + (86400 * 30), "/"); // 86400 = 1 kun
            } else {
                // Agar "Remember Me" belgilanmagan bo'lsa, cookie o'chiriladi
                if (isset($_COOKIE["user_login"])) {
                    // Cookie'ni o'chirish
                    setcookie("user_login", '', time() - 3600, '/'); // Cookie'ni o'chirish
                }
            }
            if ($loginForm->validate() && $loginForm->login()) {
                Application::$app->session->setFlash('success', 'You have successfully logged in!');
                $response->redirect('/');
                return;
            }
        }
        $this->setLayout('auth');

        return $this->render('login', [
            'model' => $loginForm,  // Dinamik title
        ]);
    }

    public function register(Request $request, Response $response)
    {
        // Agar foydalanuvchi allaqachon tizimga kirgan bo'lsa
        if (Application::$app->isLoggedIn()) {
            Application::$app->session->setFlash('success', 'You are already registered and logged in!');
            $response->redirect('/');
            return;
        }

        $user = new User();
        if ($request->isPost()) {

            $user->loadData($request->getBody());

            if ($user->validate() && $user->save()) {
                Application::$app->session->setFlash('success', 'Thanks for signing up!');
                Application::$app->response->redirect('/');
                exit;
            }
            return $this->render('register', [
                'model' => $user
            ]);
        }
        $this->setLayout('auth');
        return $this->render('register', [
            'model' => $user
        ]);
    }

    public function checkEmail()
    {
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
            $this->userModel->addErrorMessageAJAX('email', Model::RULE_UNIQUE, ['field' => 'Email']);  // Xato xabarini qo'shish
            echo json_encode([
                'status' => 'error',
                'message' => $this->userModel->getFirstError('email') // Xato xabarini olish
            ]);
        } else {
            echo json_encode(['status' => 'success']);
        }
    }

    public function logout(Request $request, Response $response)
    {
        Application::$app->logout();
        $response->redirect('/');
    }

    public function profile()
    {
        $params = [
            'title' => "Profile", // Dinamik title
        ];
        return $this->render('profile', $params);
    }
}