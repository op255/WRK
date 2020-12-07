<?php

    use App\Controllers\PostController;

    $page = isset($_GET['page']) ? $_GET['page'] : 1;

    $pController = new PostController();

    try {
        $pController->generateView(array(
                                    'postList' => $pController->getPostList($page),
                                    'numPages' => $pController->numPages(),
                                    'currentPage' => $page
                                    ), 
                                'templateMainPage.php');
    }
    catch (Exception $e) {
        $pController->generateView($e, '404.php');
    }
?>