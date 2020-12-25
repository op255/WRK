<?php

    namespace App\Views;

    class ErrorView extends View {

        public function generate($e) {
            require 'Templates/404.php';
        }
    }

?>