<?php

spl_autoload_register(function ($class) {

    $prefix = 'App\\';

    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }

    $relative_class = substr($class, $len);

    $file = str_replace('\\', '/', $relative_class) . '.php';

    if (file_exists($file)) {
        require_once $file;
    }
});

$path = $_SERVER["REQUEST_URI"];

if (substr($path, 7) == "/thread") {
    $id = (int)substr($path, 7, strlen($path));
    $page = $id ? "threadPage" : "404";
    require "Views/$page.php";
}
else
    require 'Views/mainPage.php';

?>