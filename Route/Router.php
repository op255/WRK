<?php

namespace App\Route;

use App\Core\DBConnection;

use App\Views\BoardView;
use App\Views\ThreadView;
use App\Views\SignupView;
use App\Views\LoginView;
use App\Views\ErrorView;
use App\Views\ConfirmationView;
use App\Views\ThreadEditorView;
use App\Views\AdminPanelView;


class Router {
    public function get($uri, $getParam) {
        extract($getParam, EXTR_SKIP);

        try {
            $connection = new DBConnection();
        }
        catch (\Exception $e) {
            ErrorView::generate($e);
            die();
        }

        if (substr($uri, 0, 7) == "/thread") {
            $id = (int)substr($uri, 7, strlen($uri));
            $view = new ThreadView($connection);
            $content = $id;
        }
        elseif ($uri== "/signup"){
            $content = $_POST;
            $view = new SignupView($connection);
        }
        elseif ($uri == "/login"){
            if (isset($_SESSION['username'])) {
                header("Location: /");
                die();
            }
            $content = $_POST;
            $view = new LoginView($connection);
        }
        elseif (substr($uri, 0, 8) == "/confirm"){
            $content = substr($uri, 8, strlen($uri));
            $view = new ConfirmationView($connection);
        }
        elseif ($uri == "/logout"){
            session_destroy();
            unset($_SESSION);
            header("Location: /");
        }
        elseif ($uri== "/newthread"){
            $content = "";
            $view = new ThreadEditorView($connection);
        }
        elseif ($uri== "/admin"){
            $content = "";
            $view = new AdminPanelView($connection);
        }
        elseif (substr($uri, 0, 2) == "/?" or $uri == "/") {
            $page = isset($page) ? $page : 1;
            $view = new BoardView($connection);
            $content = $page;
        } 
        else {
            $e = new \Exception("Page not found");
            ErrorView::generate($e);
            die();
        }
        
        $view->generate($content);
    }
}

?>