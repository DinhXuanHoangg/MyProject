<?php
	include('connect.php');


?>

<!DOCTYPE html>
<html>
<head>
	<title>Sigup</title>
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<img class="wave" src="images/wave.png">
	<div class="container">
		<div class="img">
			<img src="images/bg.svg">
		</div>
		<div class="login-content">
			<form action="checksigup.php" method="POST">
				<img src="images/1548659599290.png">
				<h2 class="title">Welcome</h2>
                <div class="input-div one">
                    <div class="i">
                            <i class="fas fa-home"></i>
                    </div>
                    <div class="div">
                            <h5>Address</h5>
                            <input type="text" class="input" name="Address" required>
                    </div>
                 </div>
                 <div class="input-div one">
                    <div class="i">
                            <i class="fas fa-phone-alt"></i>
                    </div>
                    <div class="div">
                            <h5>Phone Number</h5>
                            <input type="text" class="input" name="PhoneNumber" required>
                    </div>
                 </div>
                 <div class="input-div one">
                    <div class="i">
                            <i class="fas fa-at"></i>
                    </div>
                    <div class="div">
                            <h5>Email</h5>
                            <input type="text" class="input" name="Email" required>
                    </div>
                 </div>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Username</h5>
           		   		<input type="text" class="input" name="UserName" required>
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Password</h5>
           		    	<input type="password" class="input" name="PassWord" required> 
            	   </div>
            	</div>

				

            	<input type="submit" name="reg" class="btn" value="Sigup">
				<div class="back">
				<a href="index.php"><i class="fas fa-arrow-circle-left"></i></a>
				</div>
            </form>
        </div>
    </div>
    <script type="text/javascript" src="js/main.js"></script>
</body>
</html>
