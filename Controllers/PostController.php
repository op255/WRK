<?php

    namespace App\Controllers;

    use App\Repos\PostRepository;


    class PostController extends Controller {

        public function getPostList($page) {
            return $this->repo->uploadPosts($page);
        }

        public function getLatestComments ($id) {
            return $this->repo->getLatestComments($id);
        }

        public function numPages() {
            return $this->repo->numPages();
        }

        public function deletePost($id) {
            $this->repo->deletePost((int)$id);
        }

        public function __construct($conn) {
            $this->repo = new PostRepository($conn);
        }
    }
?>