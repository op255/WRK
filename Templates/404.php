<head>
    <link rel="stylesheet" href="/Styles/main.css">
    <title>Not found - IPch</title>
</head>

<body>
    <div class="topMenu">
        <?php require "topMenuTemplate.php"; ?>
    </div>
    <hr>
    <h1 align="center" class="header">
        404 
        <?php if(isset($e)) :
            echo $e->getMessage(); 
        endif; ?>
    </h1>
    <h2 align="center">
        <a href="/">Main page</a>
    </h2>
</body>
    