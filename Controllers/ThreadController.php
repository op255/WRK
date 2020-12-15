<?php

namespace App\Controllers;

use App\Repos\PostRepository;
use App\Models\Post;

class ThreadController extends Controller {

    protected $id;

    public function getPost() {
        $post = new Post($this->repo->getPost($this->id));
        return $post->get();
    }

    public function getCommentsList() {
        $result = array();
        $commentsList = $this->repo->uploadComments($this->id);

        foreach ($commentsList as &$comment) {
            $post = new Post($comment);
            array_push($result, $post->get());
        }

        return $result;
    }

    public function __construct($id) {
        parent::__construct();
        $this->repo = new PostRepository();
        $this->id = $id;
    }
}

?>