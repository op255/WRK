<?php

    namespace App\Controllers;

    include 'models/post.php';

    use App\Models\Post;

    class PostController extends Controller {

        public function getPostList($page) {
            $postList = $this->model->uploadPosts($page);
            $result = array();
            
            foreach ($postList as &$post) {
                array_push($result, array(
                    'id' => $post->getId(),
                    'textContent' => $post->getTextContent()
                ));
            }
            return $result;
        }

        public function __construct() {
            parent::__construct();
            $this->model = new Post();
        }
    }
?>