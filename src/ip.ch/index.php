<?php

$path = $_SERVER["REQUEST_URI"];

include 'core/model.php';
include 'core/view.php';
include 'core/controller.php';
include 'core/repository.php';

// Routing will be there
require 'views/mainPage.php';

?>