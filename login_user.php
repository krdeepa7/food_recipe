<?php

session_start();


?>
<!DOCTYPE>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>My Kitchen :)</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="short icon" href="Images/ogo4.jpeg" type="image/x-icon">
</head>
<body>
<div class="container">
	<div class="header">
		<div>
			<a href="index.php"><img src="images/logo3.jpg" alt="Logo" height="100px"></a>
		</div>
</div>
<div id="nav">
				<ul>
					<li>
						<a href="index.php">Home</a>
					</li>
					<li>
						<a href="register_user.php">Register</a>
					</li>
					<li class="current">
						<a href="login_user.php">Login</a>
					</li>
					<li>
						<a href="about.php">About</a>
					</li>
					<li>
						<a href="contact.php">Contact</a>
					</li>
				</ul>
</div>
<div class="body">
				<form action="login_user.php" method="post" enctype="multipart/form-data" id="form2">
					<table>
						<tr>
							<td colspan="6" align="center">
							<h1>LOG IN</h1>
							</td>
						</tr>
						<tr>
							<td>E-Mail:</td>
							<td><input type="email" name="email" placeholder="E-Mail!" required></td>
						</tr>
						<tr>
							<td>Password:</td>
							<td><input type="password" name="pass" placeholder="Password!" required></td>
						</tr>
						<tr>
							<td align="center" colspan="6">
								<button type="submit" name="login" id="btn2">Log In</button>
							</td>
						</tr>
					</table>
				</form>
<?php
include ("includes/connect.php");

if(isset($_POST['login'])){
	
	
	$email = mysqli_real_escape_string($con,$_POST['email']);
	$pass = mysqli_real_escape_string($con,$_POST['pass']);
	
	$encrypt = md5($pass);
	
	$login_query = "select * from users where email='$email' AND pass='$pass'";
	
	$run = mysqli_query($con,$login_query);
	 
	if(mysqli_num_rows($run)>0){
		
			$_SESSION['email']=$email;
			
		echo"<script>window.open('recipes.php','_self')</script>";
		
	}
	else{
		echo"<script>alert('Username/Password Incorrect!')</script>";
	}
}


?>
</div>
<div class="footer">
		<div>
			<p>
				&copy; Copyright 2017
			</p>
		</div>
	</div>
</div>
</body>
</html>