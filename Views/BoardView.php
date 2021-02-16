<?php

    namespace App\Views;

    use App\Controllers\PostController;


    class BoardView extends View {

        public function generate($page){
            try {
                extract($_POST, EXTR_SKIP);
                if (isset($delete))
                    $this->controller->deletePost($delete);

                $postList = $this->controller->getPostList($page);
                $boardContent = array();
                foreach($postList as &$post) {
                    $comments = $this->controller->getLatestComments($post->getId());
                    foreach($comments as &$comment)
                        $comment = $comment->getContent();
                        array_push($boardContent, array(   
                            'post' => $post->getContent(), 
                            'comments' => $comments
                        ));
                }
                $content = array(   
                    'postList' => $boardContent,
                    'numPages' => $this->controller->numPages(),
                    'currentPage' => $page);
                    
                $postTemplate = 'Templates/PostTemplate.php'; 
                require 'Templates/BoardTemplate.php';  
            }
            catch (\Exception $e) {
                ErrorView::generate($e);
            }
        }

        public function __construct($conn) {
            $this->controller = new PostController($conn);
        }
    }
?>