<HTML>

<head>
    <link rel="stylesheet" href="/styles/main.css">
    <title>IPch</title>
</head>

<body>
<div class="topMenu">
        <h1>IPch</h1>
        <h2>Welcome back. Again.</h2>
        <div class="search">Search</div>
        <div class="login">Log In</div>
    </div>

    <hr>

    <div class="board">
        <?php
            foreach ($contentView as &$post) {
                require 'templates/templatePost.php';
            }
        ?>
    </div>

    <ul class="pagesList">
        <li> <div class="pageButton">Pg1</div> </li>
        <li> <div class="pageButton">Pg2</div> </li>
    </ul>
</body>

</HTML>
