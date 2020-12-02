<?php

    namespace App\Repos;

    include 'models/post.php';

    use App\Models\Post;

    class PostRepository extends Repository {

        public function uploadPosts($page) {
            $result = array();
            $stm = $this->pdo->query("SELECT * FROM posts ORDER BY id DESC");
            while ($post = $stm->fetch()){
                array_push($result, $post/*new Post(   $post['id'], 
                                                $post['text_content'],
                                                $post['reply_to'],
                                                $post['img_src'],
            $post['parent'])*/);
            }

            return $result;
        }

        public function __construct() {
            parent::__construct();
        }
    }
?>