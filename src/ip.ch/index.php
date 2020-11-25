<?php
$path = $_SERVER["REQUEST_URI"];

echo $path;
// $fn = ($path) ? 'content' . $path . 'index.php' : 'content/nsk/index.php';
// (file_exists($fn)) ? require $fn : require 'content/404/index.php'; 