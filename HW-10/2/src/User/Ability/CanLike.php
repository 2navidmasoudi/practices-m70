<?php

namespace App\User\Ability;

use App\Blog;
use App\Post\Post;

trait CanLike
{
    // Without blog
    public function like($post)
    {
        $post->addLike($this);
    }

    // With blog
    public function likeOnBlog(Blog $blog, Post $post)
    {
        if (!in_array($this, $blog->getUsers())) {
            // echo "User does not belong to this blog." . PHP_EOL;
            return false;
        }

        $postId = array_search($post, $blog->getPosts());
        if ($postId === false) {
            // echo "Post is not in this blog." . PHP_EOL;
            return false;
        }

        $blog->getPosts()[$postId]->addLike($this);
    }
}
