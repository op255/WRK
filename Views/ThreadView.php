<?php

    namespace App\Views;

    use App\Controllers\ThreadController;


    class ThreadView extends View {

        public function generate($id) {
            try {
                $thread = $this->controller->getPost($id)->getContent();
                $comments = $this->controller->getCommentsList($id);

                foreach ($comments as &$comm) $comm = $comm->getContent();

                $postTemplate = 'Templates/PostTemplate.php';
                require 'Templates/ThreadTemplate.php';
            }
            catch (\Exception $e) {
                ErrorView::generate($e);
            }
        }

        public function __construct($conn) {
            $this->controller = new ThreadController($conn);
        }
    }
    
?>