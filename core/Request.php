<?php

/**
 * Create By:  PhpStorm
 * Project:    Qovoq.local
 * Developer:  Shohrux
 * Date:       21.09.2024
 * Time:       7:46
 */

namespace app\core;
class Request
{
    public function getPath()
    {
        $path = $_SERVER['REQUEST_URI'] ?? '/';
        $position = strpos($path, '?');
        if ($position === false) {
            return $path;
        }
        return substr($path, 0, $position);

    }

    public function method()
    {
        return strtolower($_SERVER['REQUEST_METHOD'] ?? '');
    }

    public function isGet(): string
    {
        return $this->method() === 'get';
    }
    public function isPost(): string
    {
        return $this->method() === 'post';
    }

    /*public function getBody()
    {
        $body = [];
        $method = $this->getMethod(); // getMethod() ni faqat bir marta chaqiramiz
        $inputType = $method === 'get' ? INPUT_GET : INPUT_POST;

        foreach ($method === 'get' ? $_GET : $_POST as $key => $value) {
            $body[$key] = filter_input($inputType, $key, FILTER_SANITIZE_SPECIAL_CHARS);
        }

        return $body;
    }*/
    public function getBody()
    {
        $body =[];
        if ($this->method() == 'get') {
            foreach ($_GET as $key => $value) {
                $body[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }
        if ($this->method() == 'post') {
            foreach ($_POST as $key => $value) {
                $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }

        return $body;
    }
}