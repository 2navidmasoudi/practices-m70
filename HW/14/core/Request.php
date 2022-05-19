<?php

namespace app\core;

class Request
{
    public function getPath()
    {
        $path = $this->getFullPath();
        if (preg_match("/\d+$/", $path) !== false) {
            $path = preg_replace("/\d+$/", ":id", $path);
        }
        return $path;
    }

    public function getFullPath()
    {
        $path = $_SERVER['REQUEST_URI'] ?? '/';

        // Delete get from request uri
        $position = strpos($path, "?");
        if ($position !== false) {
            $path = substr($path, 0, $position);
        }

        // Delete the end / from request
        if ($path !== "/") {
            $path = preg_replace("/\/$/", "", $path);
        }

        return $path;
    }

    public function getId(): ?string
    {
        preg_match("/\d+/", $this->getFullPath(), $match);
        return $match[0] ?? null;
    }

    public function method()
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    public function isGet()
    {
        return $this->method() === 'get';
    }

    public function isPost()
    {
        return $this->method() === 'post';
    }

    public function getBody()
    {
        $body = [];

        if ($this->isGet()) {
            foreach ($_GET as $key => $value) {
                $body[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            }
        }

        if ($this->isPost()) {
            foreach ($_POST as $key => $value) {
                $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            }
        }

        return $body;
    }
}
