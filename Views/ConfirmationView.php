<?php

    namespace App\Views;

    use App\Controllers\UserController;

    class ConfirmationView extends View {

        public function generate($token) {
            try {
                $this->controller->checkConfirmation($token);
                require 'Templates/EmailConfirmed.php';
            }
            catch (\Exception $e) {
                require 'Templates/404.php';
            }

            
        }

        public function __construct($conn) {
            $this->controller = new UserController($conn);
        }
    }
    
?>