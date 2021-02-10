<?php

    namespace App\Views;

    use App\Controllers\UserController;

    class SignupView extends View {

        public function generate($content) {
            if (isset($_POST['reg_user'])) {
                extract($content, EXTR_SKIP);
                try {
                    $_SESSION['token'] = $this->controller->reg($username, $email, $password1, $password2);
                    require 'Templates/ConfirmEmail.php';
                }
                catch (\Exception $e) {
                    require 'Templates/SignupTemplate.php';
                }
            }
            else {
                $username = "";
                $email = "";
                require 'Templates/SignupTemplate.php';
            }
        }

        public function __construct($conn) {
            $this->controller = new UserController($conn);
        }
    }
    
?>