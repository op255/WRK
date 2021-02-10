<?php

    namespace App\Repos;

    use \Exception;
    use App\Models\Post;

    class PostRepository extends Repository {

        protected $MAX_PAGE;

        public function getReplies($id) {
            $stm = $this->pdo->query("SELECT * FROM posts WHERE reply_to=$id");
            $result = $stm->fetchAll();
            foreach ($result as &$res) 
                $res = new Post($res, $this->getReplies($res['id']));
 
            return $result;
        }

        public function uploadPosts($page) {
            if (($page > $this->MAX_PAGE) or ($page < 1))
                throw new \Exception("Page not found(");

            $offset = 10 * ($page-1);
            $stm = $this->pdo->query("SELECT * FROM posts WHERE parent IS NULL ORDER BY id DESC LIMIT $offset, 10");
            $result = $stm->fetchAll();
            foreach ($result as &$res) 
                $res = new Post($res, $this->getReplies($res['id']));

            return $result;
        }

        public function uploadComments($id) {
            $stm = $this->pdo->query("SELECT * FROM posts WHERE parent=$id ORDER BY id");
            $result = $stm->fetchAll();
            foreach ($result as &$res) 
                $res = new Post($res, $this->getReplies($res['id']));

            return $result;
        }

        public function uploadPost($id) {
            $stm = $this->pdo->query("SELECT * FROM posts WHERE id=$id");
            $post = $stm->fetch();
            if (!$post)
                throw new \Exception("There is no such thread(");
            $result = new Post($post, $this->getReplies($post['id']));

            return $result;
        }  

        public function numPages() {
            return $this->MAX_PAGE;
        }

        public function __construct($conn) {
            parent::__construct($conn);

            $stm = $this->pdo->query("SELECT COUNT(*) FROM posts WHERE parent IS NULL");
            $numPosts = $stm->fetch()['COUNT(*)'];
            $this->MAX_PAGE = intdiv($numPosts, 10) + 1;
        }
    }
?>