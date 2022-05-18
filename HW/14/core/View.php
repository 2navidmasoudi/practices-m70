<?php

namespace app\core;

class View
{
    public function renderView($view, $params = [])
    {
        $viewLayout = $this->viewLayout();
        $viewContent = $this->viewContent($view, $params);
        return str_replace("{{content}}", $viewContent, $viewLayout);
    }

    protected function viewLayout()
    {
        $layout = Application::$app->controller->layout;
        ob_start();
        include_once Application::$ROOT_DIR . "/views/layout/$layout.php";
        return ob_get_clean();
    }

    protected function viewContent($view, $params)
    {
        foreach ($params as $key => $value) {
            $$key = $value;
        }
        ob_start();
        include_once Application::$ROOT_DIR . "/views/$view.php";
        return ob_get_clean();
    }
}
