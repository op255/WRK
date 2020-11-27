<?php
    require_once 'controllers/mainPageController.php';

    $mpController = new ControllerMainPage();

    
// $postList = array(
//     'id' => $mpController->getPostIdList(1),
//     'textContent' => $mpController->getPostContentList(1)
// );

    $postList = $mpController->getPostList(1);

    require_once 'views/templateMainPage.php';
?>