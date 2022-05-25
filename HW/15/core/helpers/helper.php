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
