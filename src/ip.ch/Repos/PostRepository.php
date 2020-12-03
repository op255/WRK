<?php

    namespace App\Repos;

    use App\Models\Post;
    use Exception;

    class PostRepository extends Repository {

        protected $MAX_PAGE;

        public function uploadPosts($page) {
            if (($page > $this->MAX_PAGE) or ($page < 1))
                throw new Exception("There is no such page(");

            $offset = 10 * ($page-1);
            $stm = $this->pdo->query("SELECT * FROM posts ORDER BY id DESC LIMIT $offset, 10");
            $result = $stm->fetchAll();

            return $result;
        }

        public function numPages() {
            return $this->MAX_PAGE;
        }

        public function __construct() {
            parent::__construct();

            $stm = $this->pdo->query("SELECT COUNT(*) FROM posts");
            $numPosts = $stm->fetch()['COUNT(*)'];
            $this->MAX_PAGE = intdiv($numPosts, 10) + 1;
        }
    }
?>