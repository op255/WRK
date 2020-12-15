<?php

namespace App\Route

class Router {
    public function get($uri) {
        if ($q = substr($uri, 0, 7) == "/thread") {
            $id = (int)substr($uri, 7, strlen($uri));
            $page = $id ? "threadPage" : "404";
            require "Views/$page.php";
        }
        else
            require 'Views/mainPage.php';
    }
}

?>