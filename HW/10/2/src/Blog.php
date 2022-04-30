<?php

namespace App;

use App\Post\Post;
use App\User\User;

/**
 * NOTE: We don't need this class
 *       as not mentioned in problem...
 */
class Blog
{
    private array $posts = [];
    private array $users = [];

    public function addPost(Post $post): self
    {
        $this->posts[] = $post;
        return $this;
    }

    public function addUser(User $user): self
    {
        $this->users[] = $user;
        return $this;
    }

    public function getPosts(): array
    {
        return $this->posts;
    }

    public function getUsers(): array
    {
        return $this->users;
    }

    public function toHTML(bool $return = false): ?string
    {
        $html = "";
        foreach ($this->posts as $post) {
            $html = $post->toHTML(true);
        }
        if ($return) return $html;
        echo $html;
        return null;
    }
}
