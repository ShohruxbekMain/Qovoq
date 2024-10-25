<?php

/**
 * Create By:  PhpStorm
 * Project:    Qovoq.local
 * Developer:  Shohrux
 * Date:       21.09.2024
 * Time:       7:21
 */

namespace app\core;
class Router
{
    public Request $request;
    public Response $response;
    protected array $routes = [];

    /**
     * @param Request $request
     * @param Response $response
     */
    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }


    public function get($path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }

    public function post($path, $callback)
    {
        $this->routes['post'][$path] = $callback;
    }

    /**
     * @throws \Exception
     */
    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->method();
        $callback = $this->routes[$method][$path] ?? false;

        if ($callback === false) {
            $this->response->setStatusCode(404);
            return $this->renderView("_404");
        }

        if (is_string($callback)) {
            return $this->renderView($callback);
        }

        /*// Agar callback sinf va metodni ifodalayotgan bo'lsa:
        if (is_array($callback)) {
            // 0-qiymat controller klassi, 1-qiymat esa metod
            $controller = new $callback[0]();
            $callback[0] = $controller;
        }*/

        if (is_array($callback)) {
            $controllerClass = $callback[0];
            if (!class_exists($controllerClass)) {
                throw new \Exception("Controller class $controllerClass not found.");
            }
            Application::$app->controller = new $callback[0]();
            $callback[0] = Application::$app->controller;
        }

        return call_user_func($callback, $this->request);
    }

    public function renderView($view, $params = [])
    {
        $layoutContent = $this->layoutContent($params);
        $viewContent = $this->renderOnlyView($view, $params);
        return str_replace('{{content}}', $viewContent, $layoutContent);
    }

    public function renderContent($viewContent, $params = [])
    {
        $layoutContent = $this->layoutContent($params);
        return str_replace('{{content}}', $viewContent, $layoutContent);
    }

    protected function layoutContent($params = [])
    {
//        if (Application::$app->controller !== null && isset(Application::$app->controller->layout)) {
//            $layout = Application::$app->controller->layout;
//        } else {
//            // Tayyorlanmagan bo'lsa, standart layout-ni yuklash mumkin
//            $layout = 'main'; // Masalan, asosiy layout sifatida 'main' nomlangan layout faylni yuklash
//        }
        extract($params); // Params dan o'zgaruvchilarni ajratish
        $layout = Application::$app->controller->layout;
        ob_start();
//        $layout = Application::$app->controller->layout ?? 'main'; // Bo'sh bo'lsa 'main' layout tanlanadi
        include_once Application::$ROOT_DIR . '/views/layouts/' . $layout . '.php';
        return ob_get_clean();
    }

    protected function renderOnlyView($view, $params)
    {
        foreach ($params as $key => $value) {
            $$key = $value;
        }
        ob_start();
        include_once Application::$ROOT_DIR . '/views/' . $view . '.php';
        return ob_get_clean();
    }
}