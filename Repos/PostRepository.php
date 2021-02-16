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

        public function addPost($textContent, $reply, $parent, $image) {
            $sql = "INSERT INTO posts (text_content, reply_to, parent, img_src) VALUES (?, ?, ?, ?)";
            $stm = $this->pdo->prepare($sql);
            $stm->execute([$textContent, $reply, $parent, $image]);
        }

        public function uploadImage($image){
            $file = "images/".basename($image["name"]);
            $ext = strtolower(pathinfo($file,PATHINFO_EXTENSION));
            $filename = "images/".basename($image["tmp_name"]).".$ext";
            move_uploaded_file($image["tmp_name"], $filename);
            return $filename;
        }

        public function deletePost($id) {
            if (!isset($_SESSION['role']) or !$_SESSION['role'])
                throw new \Exception("Login as admin");
            
            $sqls = "DELETE FROM posts WHERE id=?";
            $sqlp = "DELETE FROM posts WHERE parent=?";

            $target = $this->uploadPost($id);
            $target = $target->getContent();
            if ($target['parent']) {
                $stm = $this->pdo->prepare($sqls);
                $stm->execute([$id]);
            }
            else {
                $stm = $this->pdo->prepare($sqlp);
                $stm->execute([$id]);
                $stm = $this->pdo->prepare($sqls);
                $stm->execute([$id]);
            }

        }

        public function getLatestComments($id) {
            $comments =$this->uploadComments($id);
                $twoLastComments = array();
                $N = sizeof($comments);

                if (isset($comments[$N-2]))
                    array_push($twoLastComments, $comments[$N-2]);
                if (isset($comments[$N-1]))
                    array_push($twoLastComments, $comments[$N-1]);

            return $twoLastComments;
        }

        public function __construct($conn) {
            parent::__construct($conn);

            $stm = $this->pdo->query("SELECT COUNT(*) FROM posts WHERE parent IS NULL");
            $numPosts = $stm->fetch()['COUNT(*)'];
            $this->MAX_PAGE = intdiv($numPosts, 10) + 1;
        }
    }
?>