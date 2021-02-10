<div class="post">
    <div class="postTopBar">
        <div class="postTopBarElem" id="idField">
            <?php echo '#'.$post['id']; ?>
        </div>
        <div class="postTopBarElem">
        <?php if (!$post['parent']):?>
            <div class="replyButton">
                <a href="/thread<?php echo $post['id']?>?reply=<?php echo $post['id']?>">Reply</a>
            </div>
        <?php else:?>
            <div class="replyButton">
                <a href="/thread<?php echo $post['parent']?>?reply=<?php echo $post['id'];?>">Reply</a>
            </div>
        <?php endif;?>
        </div>
        <div class="postTopBarElem" id="reply_to">
            <?php if (isset($post['reply_to']))
            echo ">>".$post['reply_to']; 
            ?>
        </div>
    </div>
    <div class="postContent">
        <div class="postContentElem" id="img">
            <?php if ($post['img_src']): ?>
                <a href="<?php echo $post['img_src'];?>">
                <img src="<?php echo $post['img_src']?>">
                </a>
            <?php endif;?>
        </div>
        <div class="postContentElem" id="text_content">
            <?php echo $post['text_content']; ?>
        </div>
    </div>
    <div class="postBottomBar">
        <?php if (isset($post['replies'])):?>
            Replies:
            <?php foreach ($post['replies'] as &$rep):?>
                <a href="/thread<?php echo $rep['parent'];?>?reply=<?php echo $rep['id'];?>">#<?php echo $rep['id'];?></a>
            <?php endforeach;?>
            
        <?php endif;?>
    </div>
</div>
