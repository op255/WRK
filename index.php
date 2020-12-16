<?php

require __DIR__.'/Core/Autoload.php';

use App\Route\Router;



$router = new Router();
$router->get($_SERVER["REQUEST_URI"], $_GET);

?>