<?php

namespace App\User;

class User
{
    private static int $auto_id = 1;
    protected int $id;
    protected string $name;

    public function __construct(string $name)
    {
        $this->id = self::$auto_id++;
        $this->name = $name;
    }

    public function getAccountType(): string
    {
        return basename(str_replace("\\", "/", __CLASS__));
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }
}
