<?php

namespace App\Controllers;

use App\Repos\PostRepository;


class ThreadController extends Controller {

    public function getPost($id) {
        return $this->repo->uploadPost($id);
    }

    public function getCommentsList($id) {
        return $this->repo->uploadComments($id);
    }

    public function __construct($conn) {
        $this->repo = new PostRepository($conn);
    }
}

?>