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
                echo '<div class="pageButton"><a href="?page=1"> First  </a></div>
                <div class="pageButton"><a href="?page='.($page-1).'"> Previous </a></div>';
            if ($page-5>1) echo " ...";
            for ($i=max([1,$page-5]); $i <= min([$numPages, $page+5]); ++$i) {
                if ($i != $page)
                    echo '<div class="pageButton"><a href="?page='.$i.'">'.$i.'</a></div>';
                else
                echo '<div class="pageButton">'.$i.'</div>';
            }
            if (abs($page+5)<$numPages) echo " ...";
            if ($page != $numPages)
                echo '<div class="pageButton"><a href="?page='.($page+1).'"> Next </a></div>
                <div class="pageButton"><a href="?page='.$numPages.'"> Last </a></div>';
        ?>
    </div>
</body>

</HTML>
