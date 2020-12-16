<?php

    namespace App\Views;

    use App\Controllers\ThreadController;


    class ThreadView extends View {

        public function generate($id) {
            try {
                $thread = $this->controller->getPost($id);
                $comments = $this->controller->getCommentsList($id);
                $postTemplate = 'Templates/PostTemplate.php';

                require 'Templates/ThreadTemplate.php';
            }
            catch (Exception $e) {
                ErrorView::generate($e);
            }
        }

        public function __construct() {
            $this->controller = new ThreadController();
        }
    }
    
?>