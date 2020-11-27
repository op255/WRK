<?php
    require_once 'controllers/mainPageController.php';

    $mpController = new ControllerMainPage();

    
    $postsList = $mpController->getPostsList(1);

    require_once 'views/templateMainPage.php';
?>