<html>
<head>
  <title>IP.ch</title>
  <link rel="stylesheet" type="text/css" href="/Styles/login.css">
</head>
<body>
	<div class="topMenu">
		<a href="/">
        <div class="topMenuElem">
           <h1>IPch</h1>
            <h2>Welcome back. Again.</h2>
        </div>
        </a>
	</div>
	<hr>
  <div class="header">
  	<h2>Login</h2>
  </div>
    
    

    
  <form method="post" action="login">
  <?php if(isset($e)): ?>
        <div class="error">
        <?php echo $e->getMessage();?>
        </div>
    <?php endif; ?>
  	<div class="input-group">
  	  <label>Username or email</label>
  	  <input type="text" name="username" value="<?php echo $username; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="password">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="auth_user">Login</button>
  	</div>
  	<p>
  		Do not have an account yet? <a href="/signup">Sign up</a>
  	</p>
  </form>
</body>
</html>