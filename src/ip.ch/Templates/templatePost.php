<div class="post">
    <div class="postTopBar">
        <div class="postTopBarElem" id="idField">
            <?php echo '#'.$post['id']; ?>
        </div>
        <div class="postTopBarElem">
        <?php
            if (!$post['parent'])
            echo    '<div class="replyButton">
                        <a href="/thread'.$post['id'].'">Reply</a>
                    </div>';
            else
            echo    '<div class="replyButton">
                        <a href="/thread'.$post['parent'].'?reply='.$post['id'].'">Reply</a>
                    </div>';
        ?>
        </div>
    </div>
    <div class="postContent">
        <div class="postContentElem" id="img">
            <?php 
                if ($post['img_src'])
                    echo '  <a href="'.$post['img_src'].'">
                            <img src="'.$post['img_src'].'">
                            </a>'; 
            ?>
        </div>
        <div class="postContentElem" id="text_content">
            <?php echo $post['text_content']; ?>
        </div>
    </div>
    <div class="postBottomBar">
        Replies:
        <?php
            if (isset($post['replies'])) {
                foreach ($post['replies'] as &$rep) {
                    if (!$rep['parent'])
                    echo    '
                                <a href="/thread'.$rep['id'].'">#'.$rep['id'].'</a>
                            ';
                    else
                    echo    '
                                <a href="/thread'.$rep['parent'].'?reply='.$rep['id'].'">#'.$rep['id'].'</a>
                            ';
                    //echo "#".$rep['id']." ";
                }
            }
        ?>
    </div>
</div>
<!-- <div class="comments">
    <div class="reply">
        Comment1
    </div>
    <div class="reply">
        Comment2
    </div>
</div> -->