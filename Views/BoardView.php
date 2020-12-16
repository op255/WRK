<?php

    namespace App\Views;

    use App\Controllers\PostController;


    class BoardView extends View {

        public function generate($page){
            try {
                $content = array(   
                    'postList' => array(    'post' => $this->controller->getPostList($page),
                                            'comments' => $this->controller->getLatestComments($page)),
                    'numPages' => $this->controller->numPages(),
                    'currentPage' => $page
                                );
                
                    
                $postTemplate = 'Templates/PostTemplate.php'; 
                require 'Templates/BoardTemplate.php';  
            }
            catch (Exception $e) {
                ErrorView::generate($e);
            }
        }

        public function __construct() {
            $this->controller = new PostController();
        }
    }
?>