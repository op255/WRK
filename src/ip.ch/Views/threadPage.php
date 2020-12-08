<?php

    use App\Controllers\ThreadController;

    $tController = new ThreadController();

    try {
        $tController->generateView(array(
                                    'post' => $tController->getPost($id),
                                    'comments' => $tController->getCommentsList($id)
                                    ), 
                                'templateThreadPage.php');
    }
    catch (Exception $e) {
        $tController->generateView($e, '404.php');
    }
?>