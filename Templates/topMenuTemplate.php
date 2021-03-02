<a href="/">
    <div class="topMenuElem" id="logo">
        <h1>IPch</h1>
        <h2>Welcome back. Again.</h2>
    </div>
</a>

<?php if(!isset($_SESSION['username'])):?>
    <div class="topMenuElem" id="signup">
        <a href="/signup">SignUp</a>
    </div>

    <div class="topMenuElem" id="login">
        <a href="/login">Login</a>
    </div>
<?php else:?>
    <div class="topMenuElem">
        <?php echo "Hello, ".$_SESSION['username']."!"; ?>
    </div>

    <a href="/newthread">
        <div class="topMenuElem" id="newThreadBtn">
                New thread
        </div>
    </a>

    <div class="topMenuElem" id="login">
        <a href="/logout">Logout</a>
    </div>
<?php endif;?>