<?php
    require __DIR__.'/../models/post.php';
    class PostController {

        public function requestPostId() { return 0; }
    }

function id($post) {
    return $post.getId();
}

?>