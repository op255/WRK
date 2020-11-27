<?php
    require_once 'models/post.php';

    class ControllerMainPage extends Controller {
        public function getPostIdList($page) {
            $post1 = new Post(123);
            $post2 = new Post(321);
            return array($post1->getId(), $post2->getId());
        }

        public function getPostContentList($page) {
            $post1 = new Post(123);
            $post2 = new Post(321);
            return array($post1->getTextContent(), $post2->getTextContent());
        }

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