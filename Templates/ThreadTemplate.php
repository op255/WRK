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
        <div class="topMenuElem"></div>
        <div class="topMenuElem" id="login"></div>
    </div>

    <hr>

    <div class="thread">
    <?php   $post = $content['post'];
            require $postTemplate;
    ?>
    </div>

    <div class="comments">
    <?php foreach($content['comments'] as &$post):
            require $postTemplate;
    endforeach; ?>
    </div>

</body>

</HTML>