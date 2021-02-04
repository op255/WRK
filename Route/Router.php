<?php

namespace App\Route;

use App\Core\DBConnection;

use App\Views\BoardView;
use App\Views\ThreadView;
use App\Views\SignupView;
use App\Views\LoginView;
use App\Views\ErrorView;


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
        elseif (substr($uri, 0, 7) == "/signup"){
            $content = $_POST;
            $view = new SignupView($connection);
        }
        elseif (substr($uri, 0, 6) == "/login"){
            if (isset($_SESSION['username'])) {
                header("Location: https://ip.ch");
                die();
            }
            $content = $_POST;
            $view = new LoginView($connection);
        }
        elseif (substr($uri, 0, 7) == "/logout"){
            session_destroy();
            unset($_SESSION['username']);
            header("Location: https://ip.ch");
        }
        elseif (substr($uri, 0, 2) == "/?" or $uri == "/") {
            $page = isset($page) ? $page : 1;
            $view = new BoardView($connection);
            $content = $page;
        } 
        else {
            $e = new \Exception("No such page");
            ErrorView::generate($e);
            die();
        }
        
        $view->generate($content);
    }
}

?>