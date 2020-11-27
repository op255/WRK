<?php
    require_once 'controllers/postController.php';

    $pController = new PostController();

    $postList = $pController->getPostList(1);

    require_once 'views/templateMainPage.php';
?>