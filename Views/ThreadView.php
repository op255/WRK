<?php

    namespace App\Views;

    use App\Controllers\ThreadController;


    class ThreadView extends View {

        public function generate($id) {
            try {
                extract($_GET, EXTR_SKIP);
                extract($_POST, EXTR_SKIP);

                if (isset($delete))
                    $this->controller->deletePost($delete);

                if (isset($commentText) and $commentText and isset($_SESSION['token'])) {
                    $image = "";
                    if (isset($_FILES['image']) and !$_FILES['image']['error'])
                        $image = $this->controller->uploadImage($_FILES['image']);
                    $this->controller->addPost($commentText, $reply, $id, $image);
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