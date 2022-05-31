<?php

use app\core\View;

function findObjectById($id, $array)
{
    foreach ($array as $element) {
        if ($id == $element->id) {
            return $element;
        }
    }
    return false;
}

function dd($data)
{
    echo '<pre>';
    var_dump($data);
    echo '</pre>';
    die;
}

function view($view, $params)
{
    return (new View)->renderView($view, $params);
}
