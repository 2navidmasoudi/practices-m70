<?php

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
