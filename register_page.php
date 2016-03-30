<?php
session_start();
include('register.php');
?>

<!DOCTYPE HTML>
<html>
<head>
<title>Register</title>
<link rel="stylesheet" href="style.css" />
</head>
<body>
<?php include_once 'header.php';?>
<div class="container">
	<h2>Register</h2>
	<p class="centre"> * Required field</p>

		<form method="post" action="">
			<div class="main">
			
				<label>Email * :</label>
				<input class="input" type="text" name="email" value="" >
				<span class="error"><?php echo $emailError;?></span>

				<label>Username * :</label>
				<input class="input" type="text" name="username" value="">
				<span class="error"><?php echo $usernameError;?></span>

				<label>Password * :</label>
				<input class="input" type="text" name="PW" value="">

				<label>Repeat Password * :</label>
				<input class="input" type="text" name="repeatPW" value="">
				<span class="error"><?php echo $passwordError;?></span>
			</div>

			<div class="main">
				<label>First Name * :</label>
				<input class="input" type="text" name="first_name" value="">
				<span class="error"><?php echo $requiredFNError;?></span>

				<label>Last Name * :</label>
				<input class="input" type="text" name="last_name" value="">
				<span class="error"><?php echo $requiredLNError;?></span>

				<label>Phone Number * :</label>
				<input class="input" type="text" name="phone_num" value="">
				<span class="error"><?php echo $requiredPNError;?></span>

			</div>
			
			<div class="button-centre">
				<input class="submit" type="submit" name="submit" value="Submit">
				<!--<span class="success"><?php echo $successMessage;?></span>-->
				
				<p>Already have an account? <a href="index.php">Login</a></p>
			</div>
		</form>

		

	
</div>
</body>
</html>