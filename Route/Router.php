<?php

namespace App\Route;

use App\Core\DBConnection;
use App\Views\BoardView;
use App\Views\ThreadView;


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
        else {
            $page = isset($page) ? $page : 1;
            $view = new BoardView($connection);
            $content = $page;
        } 
        
        $view->generate($content);
    }
}

?>