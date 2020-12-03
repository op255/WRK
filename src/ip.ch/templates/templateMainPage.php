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
            foreach ($contentView['postList'] as &$post) {
                require 'templates/templatePost.php';
            }
        ?>
    </div>

    <hr>

    <div class="pagesList">
        <?php
            for ($i=1; $i <= $contentView['numPages']; ++$i) {
                echo '<div class="pageButton"><a href="?page='.$i.'">'.$i.'</a></div>';
            }
        ?>
    </div>
</body>

</HTML>
