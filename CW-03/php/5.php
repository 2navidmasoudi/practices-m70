<?php

$arr = [];

function add($key, $value)
{
    global $arr;
    $arr = array_merge($arr, [$key => $value]);
}

function get($key)
{
    global $arr;
    return $arr[$key] ?? null;
}

function remove($key)
{
    global $arr;
    unset($arr[$key]);
}

add('foo', 'bar');
// add('foo', 'bar');
// echo get('fooo');
// remove('fooo');

var_dump($arr);
