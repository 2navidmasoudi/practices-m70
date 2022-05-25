<?php

namespace app\core;

class Controller
{
    public string $layout = "main";
    public function setLayout($layout)
    {
        $this->layout = $layout;
    }
    public function render($view, $params = [])
    {
        return (new View)->renderView($view, $params);
    }
}
