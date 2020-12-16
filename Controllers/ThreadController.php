<?php

namespace App\Controllers;

use App\Repos\PostRepository;
use App\Models\Post;

class ThreadController extends Controller {

    public function getPost($id) {
        $post = new Post($this->repo->getPost($id));
        return $post->get();
    }

    public function getCommentsList($id) {
        $result = array();
        $commentsList = $this->repo->uploadComments($id);

        foreach ($commentsList as &$comment) {
            $post = new Post($comment);
            array_push($result, $post->get());
        }

        return $result;
    }

    public function __construct() {
        parent::__construct();
        $this->repo = new PostRepository();
    }
}

?>