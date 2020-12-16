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
        404 
        <?php if(isset($e)) :
            echo $e->getMessage(); 
        endif; ?>
    </h1>
    <h2 align="center">
        <a href="https://ip.ch">Main page</a>
    </h2>
</body>
    