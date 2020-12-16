<?php

    namespace App\Repos;

    use Exception;
    use App\Models\Post;

    class PostRepository extends Repository {

        protected $MAX_PAGE;

        public function getReplies($id) {
            $stm = $this->pdo->query("SELECT * FROM posts WHERE reply_to=$id");
            $result = $stm->fetchAll();
            for ($i = 0; $i < sizeof($result); ++$i)
                $result[$i] = new Post($result[$i], $this->getReplies($result[$i]['id']));
 
            return $result;
        }

        public function uploadPosts($page) {
            if (($page > $this->MAX_PAGE) or ($page < 1))
                throw new Exception("Page not found(");

            $offset = 10 * ($page-1);
            $stm = $this->pdo->query("SELECT * FROM posts WHERE parent IS NULL ORDER BY id DESC LIMIT $offset, 10");
            $result = $stm->fetchAll();
            for ($i = 0; $i < sizeof($result); ++$i)
                $result[$i] = new Post($result[$i], $this->getReplies($result[$i]['id']));

            return $result;
        }

        public function uploadComments($id) {
            $stm = $this->pdo->query("SELECT * FROM posts WHERE parent=$id ORDER BY id");
            $result = $stm->fetchAll();
            for ($i = 0; $i < sizeof($result); ++$i)
                $result[$i] = new Post($result[$i], $this->getReplies($result[$i]['id']));

            return $result;
        }

        public function uploadPost($id) {
            $stm = $this->pdo->query("SELECT * FROM posts WHERE id=$id");
            $post = $stm->fetch();
            $result = new Post($post, $this->getReplies($post['id']));

            return $result;
        }  

        public function numPages() {
            return $this->MAX_PAGE;
        }

        public function __construct() {
            parent::__construct();

            $stm = $this->pdo->query("SELECT COUNT(*) FROM posts WHERE parent IS NULL");
            $numPosts = $stm->fetch()['COUNT(*)'];
            $this->MAX_PAGE = intdiv($numPosts, 10) + 1;
        }
    }
?>