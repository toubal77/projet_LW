<?php
  class PostsController {
    public function index() {
      // we store all the posts in a variable
     // $posts = Post::all();
      require_once('views/posts/index.php');
    }

    public function create() {
      require_once('views/posts/create.php');
    }

    public function show() {
        require_once('views/posts/show.php');
    }
  }
?>