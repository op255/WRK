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


    <div class="board">
        <?php foreach ($content['postList'] as &$item) :?>
                <?php $post = $item['post']; 
                require $postTemplate; ?>
        <div class="comments">
                <?php foreach($item['comments'] as &$post) :
                    require $postTemplate;
                endforeach; ?>
        </div>

        <?php endforeach; ?>
    </div>

    <hr>

    <div class="pagesList">
        <?php
            $page = $content['currentPage'];
            $numPages = $content['numPages'];
        ?>
            <?php if ($page != 1) : ?>
                <div class="pageButton"><a href="?page=1"> First  </a></div>
                <div class="pageButton"><a href="?page=<?php echo $page-1; ?>"> Previous </a></div>
            <?php endif; ?>
            <?php if ($page-5>1) : ?>
            ...
            <?php endif; ?>
            <?php for ($i=max([1,$page-5]); $i <= min([$numPages, $page+5]); ++$i) : ?>
                <?php if ($i != $page) : ?>
                    <div class="pageButton"><a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a></div>
                <?php else : ?>
                    <div class="pageButton"><?php echo $i; ?></div>
                <?php endif; ?>
            <?php endfor; ?>
            <?php if (abs($page+5)<$numPages) : ?>
            ...
            <?php endif; ?>
            <?php if ($page != $numPages) :?>
                <div class="pageButton"><a href="?page=<?php echo $page+1; ?>"> Next </a></div>
                <div class="pageButton"><a href="?page=<?php echo $numPages; ?>"> Last </a></div>
            <?php endif; ?>
    </div>
</body>

</HTML>
