<?php require('../controllers/userConnected.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Animated Login Form</title>
	<link rel="stylesheet" type="text/css" href="assets/css/style_login.css">
	<link rel="stylesheet" href="assets/icon/all.min.css">
    <link rel="stylesheet" href="assets/icon/fontawesome.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<img class="wave" src="assets/img/wave.png">
	<div class="container">
		<div class="img">
			<img src="assets/img/bg.svg">
		</div>
		<div class="login-content">
			<form method="POST">
				<img src="assets/img/avatar.svg">
				<h2 class="title">Welcome</h2>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Username</h5>
           		   		<input type="text" name="userName" class="input">
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Password</h5>
           		    	<input type="password" name="userPassword" class="input">
            	   </div>
            	</div>
                <div class="alert"><?php if(isset($errord)){echo $errord;} ?></div>
            	<a href="#">Forgot Password?</a>
            	<input type="submit" name="validate" class="btn" value="Login">
            </form>

        </div>
    </div>
    <script type="text/javascript" src="assets/js/main_login.js"></script>
</body>
</html>
