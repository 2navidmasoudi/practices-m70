<?php

namespace App\User\Ability;

use App\Blog;
use App\Post\Post;

trait CanComment
{
    // without Blog
    public function comment(Post $post, string $text)
    {
        $post->addComment($this, $text);
    }

    // With Blog
    public function commentOnBlog(Blog $blog, Post $post, string $text)
    {
        if (!in_array($this, $blog->getUsers())) {
            echo "User does not belong to this blog." . PHP_EOL;
            return false;
        }

        $postId = array_search($post, $blog->getPosts());
        if ($postId === false) {
            echo "Post is not in this blog." . PHP_EOL;
            return false;
        }

        $blog->getPosts()[$postId]->addComment($this, $text);
    }
}
