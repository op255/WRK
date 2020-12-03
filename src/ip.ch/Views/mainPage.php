<?php

    use App\Controllers\PostController;

    $pController = new PostController();
    try {
        $pController->generateView(array(
                                    'postList' => $pController->getPostList($page),
                                    'numPages' => $pController->numPages()
                                    ), 
                                'templateMainPage.php');
    }
    catch (Exception $err) {
        $pController->generateView($err, '404.php');
    }
?>