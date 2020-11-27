<?php
    require_once 'models/post.php';

    class ControllerMainPage extends Controller {
        public function getPostsList($page) {
            $post1 = new Post(123);
            $post2 = new Post(321);
            return array($post1->getId(), $post2->getId());
        }
    }
?>