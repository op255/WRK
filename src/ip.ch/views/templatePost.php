<div class="post">
    <div class="postTopBar">
        <div class="postId">
            <?php echo '#'.$post['id']; ?>
        </div>
        <div class="replyButton">Reply</div>
    </div>
    <div class="postContent">
        <?php echo $post['textContent']; ?>
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