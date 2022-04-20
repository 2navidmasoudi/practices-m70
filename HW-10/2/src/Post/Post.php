<?php

namespace App\Post;

use App\User\User;

class Post
{
    use Serializable;
    use Show;

    private static $auto_id = 1;
    private int $id;
    private string $title;
    private string $content;
    private array $comments = [];
    private array $likes = [];

    public function __construct(string $title, string $content)
    {
        $this->id = self::$auto_id++;
        $this->title = $title;
        $this->content = $content;

        // for serializing
        self::$logs[] = $this;
    }


    public function addComment(User $user, string $text): self
    {
        $this->comments[] = new Comment($user, $text);
        return $this;
    }

    public function addLike(User $user): self
    {
        if (!in_array($user, $this->likes)) {
            $this->likes[] = $user;
        }
        return $this;
    }

    public function getComments(): array
    {
        return $this->comments;
    }

    public function getLikes(): array
    {
        return $this->likes;
    }

    public function getLikeCount(): int
    {
        return count($this->likes ?? 0);
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getContent(): string
    {
        return $this->content;
    }
}
