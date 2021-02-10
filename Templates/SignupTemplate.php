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
  	<h2>Register</h2>
  </div>
    
    

    
  <form method="post" action="signup">
  <?php if(isset($e)): ?>
        <div class="error">
        <?php echo $e->getMessage();?>
        </div>
    <?php endif; ?>
  	<div class="input-group">
  	  <label>Username</label>
  	  <input type="text" name="username" value="<?php echo $username; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="email" value="<?php echo $email; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="password1">
  	</div>
  	<div class="input-group">
  	  <label>Confirm password</label>
  	  <input type="password" name="password2">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Register</button>
  	</div>
  	<p>
  		Already a member? <a href="/login">Sign in</a>
  	</p>
  </form>
</body>
</html>