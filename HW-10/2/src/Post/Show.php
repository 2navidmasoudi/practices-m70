<?php

namespace App\Post;

trait Show
{
    public function toHTML(bool $return = false): ?string
    {
        $html = "";
        $html .= "<h3>" . $this->title . "</h3>";
        $html .= "<p>" . $this->content . "</p>";

        // For like count and likers
        $html .= "<p>❤️ ";
        $html .= $this->getLikeCount();
        $html .= " liked by ";
        $likers = [];
        foreach ($this->likes as $like) {
            $likers[] = $like->getName();
        }
        $html .= implode(", ", $likers);
        $html .= "</p>";

        // For comments
        foreach ($this->comments as $comment) {
            $html .=
                "<p>"
                . $comment->getUser()->getName()
                . ": "
                . $comment->getText()
                . "</p>";
        }
        $html .= "<hr>";

        // returnable :D
        if ($return) return $html;
        echo $html;
        return null;
    }
}
