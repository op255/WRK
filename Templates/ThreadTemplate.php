<HTML>

<head>
    <link rel="stylesheet" href="/Styles/main.css">
    <title>IPch</title>
</head>

<body>
<div class="topMenu">
        <a href="https://ip.ch">
        <div class="topMenuElem">
           <h1>IPch</h1>
            <h2>Welcome back. Again.</h2>
        </div>
        </a>
        <?php if(!isset($_SESSION['username'])):?>
        <div class="topMenuElem" id="signup">
            <a href="https://ip.ch/signup">SignUp</a>
        </div>
        <div class="topMenuElem" id="login">
            <a href="https://ip.ch/login">Login</a>
        </div>
        <?php else:?>
        <div class="topMenuElem">
            <?php echo "Hello, ".$_SESSION['username']."!"; ?>
        </div>
        <div class="topMenuElem" id="logout">
            <a href="https://ip.ch/logout">Logout</a>
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

</body>

</HTML>