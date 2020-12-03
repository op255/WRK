<?php

    namespace App\Controllers;

    use App\Repos\PostRepository;
    use App\Models\Post;

    

    class PostController extends Controller {

        public function getPostList($page) {
            $postList = $this->repo->uploadPosts($page);
            return $postList;
        }

        public function numPages() {
            return $this->repo->numPages();
        }


        public function __construct() {
            parent::__construct();
            $this->repo = new PostRepository();
        }
    }
?>