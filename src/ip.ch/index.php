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

use App\Dev\DBDevTool;

if ($path == '/dev') {

    $newTextContent = '';
    $image = '';
    $id = 13;

    $dbt = new DBDevTool();
    // $dbt->act('add', array($newTextContent));
    // $dbt->act('add', array($newTextContent, $image));
    // $dbt->act('del', array($id));
}


// Routing will be there
require 'Views/mainPage.php';

?>