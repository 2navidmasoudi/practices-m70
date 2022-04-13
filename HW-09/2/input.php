<?php

class Input
{
    public static function exists(string $type = 'post'): bool
    {
        return @$_SERVER['REQUEST_METHOD'] === strtoupper($type);
    }

    public static function get(string $item): string|array|null
    {
        return $_REQUEST[$item] ?? null;
    }
}
