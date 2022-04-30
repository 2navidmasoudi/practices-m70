<?php

namespace App\Post;

use App\User\User;

class Comment
{
    private static $auto_id = 1;
    private int $id;
    private User $user;
    private string $text;

    public function __construct(User $user, string $text)
    {
        $this->id = self::$auto_id++;
        $this->user = $user;
        $this->text = $text;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function setText(string $text): self
    {
        $this->text = $text;
        return $this;
    }
}
