<HTML>

<head>
    <link rel="stylesheet" href="/Styles/main.css">
    <title>IPch</title>
</head>

<body>
<div class="topMenu">
        <div class="topMenuElem">
           <h1>IPch</h1>
            <h2>Welcome back. Again.</h2>
        </div>
        <div class="topMenuElem"></div>
        <div class="topMenuElem" id="login"></div>
    </div>

    <hr>

    <div class="board">
        <?php
            foreach ($contentView['postList'] as &$item) {
                $post = $item['post'];
                require 'Templates/templatePost.php';
                echo '<div class="comments">';
                foreach($item['comments'] as &$post)
                    require 'Templates/templatePost.php';
                echo '</div>';
            }
        ?>
    </div>

    <hr>

    <div class="pagesList">
        <?php
            $page = $contentView['currentPage'];
            $numPages = $contentView['numPages'];

            if ($page != 1)
                echo '<div class="pageButton"><a href="?page='.($numPages-1).'"> Previous </a></div>';
            for ($i=1; $i <= $numPages; ++$i) {
                if ($i != $page)
                    echo '<div class="pageButton"><a href="?page='.$i.'">'.$i.'</a></div>';
                else
                echo '<div class="pageButton">'.$i.'</div>';
            }
            if ($page != $numPages)
                echo '<div class="pageButton"><a href="?page='.($page+1).'"> Next </a></div>';
        ?>
    </div>
</body>

</HTML>
