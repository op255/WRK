<HTML>

<head>
    <link rel="stylesheet" href="/Styles/main.css">
    <title>IPch</title>
</head>

<body>
<div class="topMenu">
        <a href="/">
        <div class="topMenuElem">
           <h1>IPch</h1>
            <h2>Welcome back. Again.</h2>
        </div>
        </a>
        <?php if(!isset($_SESSION['username'])):?>
        <div class="topMenuElem" id="signup">
            <a href="/signup">SignUp</a>
        </div>
        <div class="topMenuElem" id="login">
            <a href="/login">Login</a>
        </div>
        <?php else:?>
        <div class="topMenuElem">
            <?php echo "Hello, ".$_SESSION['username']."!"; ?>
        </div>
        <div class="topMenuElem" id="logout">
            <a href="/logout">Logout</a>
        </div>
        <?php endif;?>
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