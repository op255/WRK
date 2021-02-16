<HTML>

<head>
    <link rel="stylesheet" href="/Styles/main.css">
    <title>IPch</title>
</head>

<body>
    <div class="topMenu">
        <?php require "topMenuTemplate.php"; ?>
    </div>

    <hr>

    <div class="thread">
    <?php   $post = $thread;
            require $postTemplate;
    ?>
    </div>

    <div class="comments">
    <?php foreach($comments as &$post):
            require $postTemplate;
    endforeach; ?>
    </div>

    
    <?php if(isset($_SESSION['token'])): ?>
        <div class="input-group">
        <form method="post" class="textfield" enctype="multipart/form-data">
            <div>
            <?php if(isset($reply)): echo "Reply to: >>$reply"; endif; ?>
            </div>
            <div>
            <textarea type="text" name="commentText" class="commentTextfield" maxlength=65534></textarea>
            </div>
            <button type="submit" class="btn" value="addComent">Post</button>
            <input type="file" name="image" accept="image/*">
            </div>
        </form>
        </div>
    <?php endif; ?>

</body>

</HTML>