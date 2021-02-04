<?php

    namespace App\Views;

    use App\Controllers\UserController;

    class SignupView extends View {

        public function generate($content) {
            if (isset($_POST['reg_user'])) {
                extract($content, EXTR_SKIP);
                try {
                    $this->controller->reg($username, $email, $password1, $password2);
                    $user = $this->controller->auth($username, $email, $password1);
                    $_SESSION['username'] = $user->getUsername(); 
                    header("Location: https://ip.ch");
                    die();
                }
                catch (\Exception $e) {
                    require 'Templates/SignupTemplate.php';
                }
            }
            else {
                $username = "";
                $email = "";
                $password1 = "";
                $password2 = "";
                require 'Templates/SignupTemplate.php';
            }
        }

        public function __construct($conn) {
            $this->controller = new UserController($conn);
        }
    }
    
?>