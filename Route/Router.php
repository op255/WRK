<?php

namespace App\Route;

use App\Core\DBConnection;
use App\Views\BoardView;
use App\Views\ThreadView;
use App\Views\SignupView;
use App\Views\LoginView;


class Router {
    public function get($uri, $getParam) {
        extract($getParam, EXTR_SKIP);

        try {
            $connection = new DBConnection();
        }
        catch (\Exception $e) {
            App\Views\ErrorView::generate($e);
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
            $content = $_POST;
            $view = new LoginView($connection);
        }
        elseif (substr($uri, 0, 7) == "/logout"){
            session_destroy();
            unset($_SESSION['username']);
            header("Location: https://ip.ch");
        }
        else {
            $page = isset($page) ? $page : 1;
            $view = new BoardView($connection);
            $content = $page;
        } 
        
        $view->generate($content);
    }
}

?>