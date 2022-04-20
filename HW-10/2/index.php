<?php

include "vendor/autoload.php";

/**
 * NOTE: Posts will serialize automatically
 *       Even if it's not in the blog!
 *       Log files are in .gitingnore
 *       Run code to get Log files
 *       (.txt for serialize and .json for JSON)
 * 
 * NOTE: We have this program without blog
 * but I added blog to check whether:
 * - Post exists in the blog
 * - User exists in the blog
 * - We can have multiple blogs with diffrent Users
 * - To show UI (toHTML) for all post atonce (see last line)
 * 
 * NOTE: for seeing the output of html
 *       in the $post->toHTML() run in localhost
 *       and for getting results uncomment print_r(s)
 * 
 * Happy blogging :)
 */

use App\Blog;
use App\Post\Post;
use App\User\Account\{
    Normal as NormalUser,
    Silver as SilverUser,
    Golden as GoldenUser
};

$post1 = new Post("Hello", "Welcome to my weblog!");
$post2 = new Post("About", "I'm Navid, I'm Programming!");

$normalUser1 = new NormalUser("Ali");
$normalUser1->like($post1);
// $normalUser1->comment($post1, "I can't comment! 😢"); // ERROR

$silverUser1 = new SilverUser("Javad");

$silverUser1->like($post1);
$silverUser1->comment($post1, "Love your blog! 😍");
$silverUser1->comment($post1, "Keep it up bro! 👌");

// it will in change all the program auto!
$silverUser1->setName("Mamad");

$goldenUser1 = new GoldenUser("infinity");

$goldenUser1->like($post2);
$goldenUser1->comment($post1, "Such a waste of money! 😂");
$goldenUser1->comment($post2, "You're blog is so bad! 🤮");
$goldenUser1->archive($post2); // IT MAY HAS RECURSION


// print_r($post1->getComments()); // commented by Mamad and infinity
// print_r($post1->getLikes()); // liked by Mamad and Ali
// print_r($post1->getLikeCount()); // 2
// print_r($goldenUser1->getArchives());

$post1->toHTML();
$post2->toHTML();

#################################################
# IF YOU DONT WANT BLOG JUST IGNORE REST OF CODE!
# OTHERWISE DELETE LINES 70 and 107 TO UNCOMMENT!
#################################################
/*

$blog = new Blog;

# We have these from history (code above)
// $post1 = new Post("Hello", "Welcome to my weblog!");
// $post2 = new Post("About", "I'm Navid, I'm Programming!");
// $normalUser1 = new NormalUser("Ali");
// $silverUser1 = new SilverUser("Javad");
// $goldenUser1 = new GoldenUser("infinity");

$blog
    // ->addUser($normalUser1)
    ->addUser($silverUser1)
    ->addUser($goldenUser1)
    ->addPost($post1)
    ->addPost($post2);

$normalUser1->likeOnBlog($blog, $post2); // HE CANT LIKE! NOT REGISTERED IN THIS BLOG
// $normalUser1->commentOnBlog($blog, $post1, "I can't comment! 😢"); // ERROR

$silverUser1->likeOnBlog($blog, $post1);
$silverUser1->commentOnBlog($blog, $post1, "Test on Blog!");

// it will in change all the program auto!
$silverUser1->setName("Mamad");

$goldenUser1->likeOnBlog($blog, $post2);
$goldenUser1->commentOnBlog($blog, $post2, "Test2 on Blog!");
$goldenUser1->archiveOnBlog($blog, $post2);

// print_r($blog->getUsers()); // commented by Mamad and infinity
// print_r($blog->getPosts()); // liked by Mamad

// this will show all post atonce
// $blog->toHTML();

*/