<?php

    namespace App\Views;

    use App\Controllers\UserController;

    class LoginView extends View {

        public function generate($content) {
            if (isset($_POST['auth_user'])) {
                extract($content, EXTR_SKIP);
                try {
                    $user = $this->controller->auth($username, $password);
                    $_SESSION['username'] = $user->getUsername();
                    $_SESSION['role'] = $user->getRole();
                    header("Location: /");
                    die();
                }
                catch (\Exception $e) {
                    require 'Templates/LoginTemplate.php';
                }
            }
            else {
                $username = "";
                require 'Templates/LoginTemplate.php';
            }
        }

        public function __construct($conn) {
            $this->controller = new UserController($conn);
        }
    }
    
?>