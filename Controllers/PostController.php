<?php

namespace App\Controllers;


use App\Models\Post;

class PostController extends Controller
{
    public function showPost($post_id)
    {
        $post = new Post();
        $post = $post->getPost($post_id);
        if (empty($post)) {
            return $this->ErrorPage();
        } else {
            $post = $post[0];
            return $this->render("single.twig", compact("post"));
        }
    }
    public function showAllPosts()
    {
        $posts = new Post();
        $posts = $posts->getAllPost();
        
        if (empty($posts)) {
            return $this->errorPage();
        } else {
            return $this->render("posts.twig", compact("posts"));
        }
    }
}
