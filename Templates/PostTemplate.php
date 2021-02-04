<div class="post">
    <div class="postTopBar">
        <div class="postTopBarElem" id="idField">
            <?php echo '#'.$post['id']; ?>
        </div>
        <div class="postTopBarElem">
        <?php
            if (!$post['parent'])
            echo    '<div class="replyButton">
                        <a href="/thread'.$post['id'].'?reply='.$post['id'].'">Reply</a>
                    </div>';
            else
            echo    '<div class="replyButton">
                        <a href="/thread'.$post['parent'].'?reply='.$post['id'].'">Reply</a>
                    </div>';
        ?>
        </div>
        <div class="postTopBarElem" id="reply_to">
            <?php 
            if (isset($post['reply_to']))
            echo ">>".$post['reply_to']; 
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
        <?php
            if (isset($post['replies'])) {
                echo "Replies:";
                foreach ($post['replies'] as &$rep) {
                    echo    '
                                <a href="/thread'.$rep['parent'].'?reply='.$rep['id'].'">#'.$rep['id'].'</a>
                            ';
                }
            }
        ?>
    </div>
</div>