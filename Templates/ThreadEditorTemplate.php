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

    <div class="thread-group">
        <form method="post" class="textfield" enctype="multipart/form-data">
            <div>
            <textarea type="text" name="threadText" class="threadTextfield" maxlength=65534></textarea>
            </div>
            <button type="submit" class="btn" value="addThread">Post</button>
            <input type="file" name="image" accept="image/*">
        </form>
        </div>

</body>

</HTML>