<?php

class JSONReader implements Reader
{
    private array $data = [];

    public function read(string $path)
    {
        $file = file_get_contents($path);
        $data = json_decode($file);
        $this->data = $data;
    }

    public function getData(): array
    {
        return $this->data;
    }
}
