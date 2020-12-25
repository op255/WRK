<?php

namespace App\Route;

use App\Views\BoardView;
use App\Views\ThreadView;

class Router {
    public function get($uri, $getParam) {
        extract($getParam, EXTR_SKIP);

        if (substr($uri, 0, 7) == "/thread") {
            $id = (int)substr($uri, 7, strlen($uri));
            $view = new ThreadView();
            $content = $id;
        }
        else {
            $page = isset($page) ? $page : 1;
            $view = new BoardView();
            $content = $page;
        } 
        
        $view->generate($content);
    }
}

?>