<?php

$path = $_SERVER["REQUEST_URI"];

spl_autoload_register(function ($class) {

    $prefix = 'App\\';

    $base_dir = '';

    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }

    $relative_class = substr($class, $len);

    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

    if (file_exists($file)) {
        require $file;
    }
});


// Routing will be there
$page = 1;
if (isset($_GET['page']))
    $page = $_GET['page'];

require 'Views/mainPage.php';

?>