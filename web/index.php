<?php
	include('connect.php');


?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<img class="wave" src="./images/wave.png">
	<div class="container">
		<div class="img">
			<img src="./images/bg.svg">
		</div>
		<div class="login-content">
			<form action="checklogin.php" method="POST">
				<img src="./images/1548659599290.png">
				<h2 class="title">Welcome</h2>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Username</h5>
           		   		<input type="text" class="input" name="UserName">
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Password</h5>
           		    	<input type="password" class="input" name="Password">
            	   </div>
            	</div>
				<a href="sigup.php">Signup</a>
            	<input type="submit" class="btn" value="Login" name="Login-btn">
			</form>
        </div>
    </div>
    <script type="text/javascript" src="js/main.js"></script>
</body>
</html>
