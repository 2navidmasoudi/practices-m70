<?php

namespace app\core;

class Controller
{
    public function render($view, $params = [])
    {
        return (new View)->renderView($view, $params);
    }
}
