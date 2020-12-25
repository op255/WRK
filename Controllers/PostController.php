<?php

    namespace App\Controllers;

    use App\Repos\PostRepository;
    use App\Models\Post;

    class PostController extends Controller {

        public function getPostList($page) {
            $postList = $this->repo->uploadPosts($page);

            return $postList;
        }

        public function getLatestComments ($id) {

                $comments =$this->repo->uploadComments($id);
                $twoLastComments = array();
                $N = sizeof($comments);

                if (isset($comments[$N-2]))
                    array_push($twoLastComments, $comments[$N-2]);
                if (isset($comments[$N-1]))
                    array_push($twoLastComments, $comments[$N-1]);

            return $twoLastComments;
        }

        public function numPages() {
            return $this->repo->numPages();
        }

        public function __construct($conn) {
            parent::__construct();
            $this->repo = new PostRepository($conn);
        }
    }
?>