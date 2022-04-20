<?php

namespace App\Post;

trait Serializable
{
    public static $logs = [];

    // for auto serializing
    // this is bad because it does for every object...
    public function __destruct()
    {
        self::serialize();
        self::jsonSerilizer();
    }

    public static function serialize(string $path = "Log.txt"): void
    {
        $serialized = serialize(self::$logs);
        file_put_contents($path, $serialized);
    }

    public static function jsonSerilizer(string $path = "Log.json"): void
    {
        // we can make any json (with custom keys) with these
        $logs = [];
        foreach (self::$logs as $log) {
            $comments = [];
            $likes = [];

            foreach ($log->getComments() as $comment) {
                $comments[] = [
                    "id" => $comment->getId(),
                    "User" => [
                        "id" => $comment->getUser()->getId(),
                        "Name" => $comment->getUser()->getName(),
                    ],
                    "text" => $comment->getText(),
                ];
            }
            foreach ($log->getLikes() as $like) {
                $likes[] = [
                    "User" => [
                        "id" => $like->getId(),
                        "Name" => $like->getName(),
                    ],
                ];
            }

            $logs[] = [
                "id" => $log->getId(),
                "title" => $log->getTitle(),
                "content" => $log->getContent(),
                "comments" => $comments,
                "likes" => $likes,
            ];
        }

        // THIS DOESN'T WORK FOR LIKE AND COMMENTS
        // $logs = [];
        // foreach (self::$logs as $log) {
        //     $logs[] = get_object_vars($log);
        // }

        $json = json_encode($logs, JSON_PRETTY_PRINT);
        file_put_contents($path, $json);
    }
}
