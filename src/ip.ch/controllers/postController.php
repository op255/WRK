<?php

    namespace App\Controllers;

    // include 'models/post.php';
    include 'repos/postRepository.php';

    // use App\Models\Post;
    use App\Repos\PostRepository;
    use App\Models\Post;

    

    class PostController extends Controller {

        public function getPostList($page) {

            $postList = $this->repo->uploadPosts($page);
            // $result = array();
            
            // foreach ($postList as &$post) {
            //     array_push($result, array(
            //         'id' => $post->getId(),
            //         'textContent' => $post->getTextContent()
            //     ));
            // }
            return $postList;
        }

        public function __construct() {
            parent::__construct();
            $this->repo = new PostRepository();
        }
    }
?>