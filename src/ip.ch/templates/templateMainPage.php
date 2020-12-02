<HTML>

<head>
    <link rel="stylesheet" href="/styles/main.css">
    <title>IPch</title>
</head>

<body>
<div class="topMenu">
        <div class="topMenuElem">
            <h1>IPch</h1>
            <h2>Welcome back. Again.</h2>
        </div>
        <div class="topMenuElem">Search</div>
        <div class="topMenuElem" id="login">Log In</div>
    </div>

    <hr>

    <div class="board">
        <?php
            foreach ($contentView as &$post) {
                require 'templates/templatePost.php';
            }
        ?>
    </div>

    <hr>

    <div class="pagesList">
        <div class="pageButton">Pg1</div>
        <div class="pageButton">Pg2</div>
    </div>
</body>

</HTML>
