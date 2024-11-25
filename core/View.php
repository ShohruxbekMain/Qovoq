<?php
/**
 * Create By:  PhpStorm
 * Project:    Qovoq.local
 * Developer:  Shohrux
 * Date:       27.10.2024
 * Time:       0:37
 */

namespace app\core;

/**
 * Class       View
 *
 * @author     Shohrux
 * @package    app\core
 */
class View
{
    public string $title = '';

    public function renderView($view, $params = [])
    {
        $viewContent = $this->renderOnlyView($view, $params);
        $layoutContent = $this->layoutContent();
        return str_replace('{{content}}', $viewContent, $layoutContent);
    }

    public function renderBreadcrumb($breadcrumbs)
    {
        echo '<div class="container mt-3 bg-primary-subtle rounded-2">';
        echo '<nav aria-label="breadcrumb ">';
        echo '<ol class="breadcrumb p-2">';

        foreach ($breadcrumbs as $name => $url) {
            echo '<li class="breadcrumb-item"';
            // Agar bu joriy sahifa bo'lsa, aria-current atributini qo'shamiz
            if (!$url) {
                echo ' aria-current="page"';
            }
            echo '>';
            if ($url) {
                echo '<a href="' . htmlspecialchars($url) . '">' . (array_key_exists('Home', $breadcrumbs) ? '<i class="bx bxs-home me-1"></i>' : '') . htmlspecialchars($name) . '</a>';
            } else {
                echo htmlspecialchars($name); // Agar sahifa joriy bo'lsa, faqat matnni ko'rsatamiz
            }
            echo '</li>';
        }
        echo '</ol>';
        echo '</nav>';
        echo '</div>';
    }

    public function renderContent($viewContent)
    {
        $layoutContent = $this->layoutContent();
        return str_replace('{{content}}', $viewContent, $layoutContent);
    }

    protected function layoutContent()
    {
        $layout = Application::$app->layout;
        if (Application::$app->controller) {
            $layout = Application::$app->controller->layout;
        }
        ob_start();
        include_once Application::$ROOT_DIR . '/views/layouts/' . $layout . '.php';
        return ob_get_clean();
    }

    protected function renderOnlyView($view, $params)
    {
        foreach ($params as $key => $value) {
            $$key = $value;
        }
        ob_start();
        // Breadcrumblarni joylash
        if (isset($params['breadcrumbs'])) {
            // Breadcrumb yaratish
            $this->renderBreadcrumb($params['breadcrumbs']);

        }
        include_once Application::$ROOT_DIR . '/views/' . $view . '.php';
        return ob_get_clean();
    }
}