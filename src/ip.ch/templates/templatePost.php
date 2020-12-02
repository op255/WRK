<div class="post">
    <div class="postTopBar">
        <div class="postTopBarElem" id="idField">
            <?php echo '#'.$post['id']; ?>
        </div>
        <div class="postTopBarElem">Reply</div>
    </div>
    <div class="postContent">
        <div class="postContentElem" id="img">
            <?php 
                if ($post['img_src'])
                    echo '<img src="'.$post['img_src'].'">'; 
            ?>
        </div>
        <div class="postContentElem">
            <?php echo $post['text_content']; ?>
        </div>
    </div>
    <div class="postBottomBar">
        Replies:
        <div class="replies"></div>
    </div>
</div>
<div class="comments">
    <div class="reply">
        Comment1
    </div>
    <div class="reply">
        Comment2
    </div>
</div>