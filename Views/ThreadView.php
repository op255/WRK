<?php

    namespace App\Views;

    use App\Controllers\ThreadController;


    class ThreadView extends View {

        public function generate($id) {
            try {
                extract($_GET, EXTR_SKIP);
                extract($_POST, EXTR_SKIP);

                if (isset($commentText) and $commentText and isset($_SESSION['token'])) {
                    $image = "";
                    if (isset($_FILES['image']))
                        $image = $this->controller->uploadImage($_FILES['image']);
                    $this->controller->addComment($commentText, $reply, $id, $image);
                }

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