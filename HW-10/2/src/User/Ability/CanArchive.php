<?php

namespace App\User\Ability;

use App\Blog;
use App\Post\Post;

trait CanArchive
{
    private array $archives = [];

    // without Blog
    public function archive(Post $post)
    {
        if (!in_array($post, $this->archives))
            $this->archives[] = $post;
    }

    public function getArchives(): array
    {
        // For ignoring *RECURSION* we just output post id, title and content
        $archives = [];
        foreach ($this->archives as $archive) {
            $archives[] = [
                "id" => $archive->getId(),
                "title" => $archive->getTitle(),
                "content" => $archive->getContent(),
            ];
        }
        return $archives;

        return $this->archives;
    }

    // With Blog
    public function archiveOnBlog(Blog $blog, Post $post)
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

        if (!in_array($post, $this->archives))
            $this->archives[] = $post;
    }
}
