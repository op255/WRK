<?php

    namespace App\Views;

    use App\Controllers\ThreadController;

    class ThreadEditorView extends View {

        public function generate($content) {
            if (!isset($_SESSION['token'])) {
                header("Location: /");
                die();
            }

            try {
                extract($_GET, EXTR_SKIP);
                extract($_POST, EXTR_SKIP);

                if (isset($threadText) and $threadText) {
                    $image = NULL;
                    if (isset($_FILES['image']) and !$_FILES['image']['error'])
                        $image = $this->controller->uploadImage($_FILES['image']);
                    $this->controller->addPost($threadText, NULL, NULL, $image);
                    header("Location: /");
                    die();
                }
                require "Templates/ThreadEditorTemplate.php";
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