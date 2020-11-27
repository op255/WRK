<?php

$path = $_SERVER["REQUEST_URI"];

require_once 'core/model.php';
require_once 'core/view.php';
require_once 'core/controller.php';

// Routing will be there
require_once 'views/mainPage.php';

?>