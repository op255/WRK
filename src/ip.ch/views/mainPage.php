<?php
    include 'controllers/postController.php';

    use App\Controllers\PostController;

    $pController = new PostController();
    $pController->generateView($pController->getPostList(1), 'templateMainPage.php');
?>