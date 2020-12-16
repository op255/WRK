<?php

    namespace App\Controllers;

    use App\Repos\PostRepository;
    use App\Models\Post;

    class PostController extends Controller {

        public function getPostList($page) {
            $result = array();
            try {
                $postList = $this->repo->uploadPosts($page);
            }
            catch (Exception $e) {
                throw new Exception("Failed to upload post list: ".$e->getMessage());
            }
            foreach ($postList as &$post) {
                $tmp = new Post($post);

                $comments =$this->repo->uploadComments($tmp->getId());
                $twoLastComments = array();
                $N = sizeof($comments);

                if (isset($comments[$N-2]))
                    array_push($twoLastComments, $comments[$N-2]);
                if (isset($comments[$N-1]))
                    array_push($twoLastComments, $comments[$N-1]);

                array_push($result, array(  'post' => $tmp->get(),
                                            'comments' => $twoLastComments));
            }

            return $result;
        }

        public function numPages() {
            return $this->repo->numPages();
        }

        public function __construct() {
            parent::__construct();
            $this->repo = new PostRepository();
        }
    }
?>