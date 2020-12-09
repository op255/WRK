<?php

    use App\Controllers\ThreadController;

    $tController = new ThreadController($id);

    try {
        $tController->generateView(array(
                                    'post' => $tController->getPost(),
                                    'comments' => $tController->getCommentsList()
                                    ), 
                                'templateThreadPage.php');
    }
    catch (Exception $e) {
        $tController->generateView($e, '404.php');
    }
?>