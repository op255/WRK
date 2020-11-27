<?php
    require_once 'models/post.php';

    class PostController extends Controller {

        public function getPostList($page) {
            $postList = uploadPosts($page);
            $result = array();
            foreach ($postList as &$post) {
                array_push($result, array(
                    'id' => $post->getId(),
                    'textContent' => $post->getTextContent()
                ));
            }
            return $result;
        }
    }
?>