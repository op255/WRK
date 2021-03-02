<?php

    namespace App\Views;

    use App\Controllers\ThreadController;

    class AdminPanelView extends View {

        public function generate($content) {
            if (!isset($_SESSION['token'])) {
                header("Location: /");
                die();
            }

            try {
                require "Templates/AdminPanelTemplate.php";
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