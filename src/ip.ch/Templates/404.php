<head>
    <title>Not found - IPch</title>
</head>

<body>
    <div class="topMenu">
        <h1>IPch</h1>
        <h2>Welcome back. Again.</h2>
    </div>
    <hr>
    <h1 align="center">
        404. 
        <?php 
            if(isset($e)) echo $contentView->getMessage(); 
        ?>
    </h1>
    <h2 align="center">
        <a href="?page=1">Main page</a>
    </h2>
</body>
    