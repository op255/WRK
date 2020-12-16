<?php

namespace App\Route;

use App\Views\BoardView;
use App\Views\ThreadView;

class Router {
    public function get($uri, $getParam) {
        extract($getParam, EXTR_SKIP);
        if ($q = substr($uri, 0, 7) == "/thread") {
            $id = (int)substr($uri, 7, strlen($uri));
            // $page = $id ? "threadPage" : "404";
            // require "Views/$page.php";
            if (is_int($id)) {
                $view = new ThreadView();
                $view->generate($id);
            }
            else {
                $view = new ErrorView();
                $view->generate(new Exception("No such thread"));
            }
        }
        else {
            $page = isset($page) ? $page : 1;
            $view = new BoardView();
            $view->generate($page);
        }      
    }
}

?>