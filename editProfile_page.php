<?php
include('editProfile.php');
include('redirect.php');
?>

<!DOCTYPE HTML>
<html>
<head>
<title>Edit Profile</title>
<link rel="stylesheet" href="style.css" />
</head>
<body>
<?php include 'header.php';?>
<div class="container">
	<h2>Edit Profile</h2>
	<p class="centre"> Only complete fields you wish to change</p>

		<form method="post" action="">
			<div class="main">

                <label>Old Password :</label>
				<input class="input" type="password" name="oldPW" value="">

				<label>New Password :</label>
				<input class="input" type="password" name="newPW" value="">

				<label>Repeat Password :</label>
				<input class="input" type="password" name="repeatNewPW" value="">
				<span class="error"><?php echo $passwordError;?></span>
			</div>

			<div class="main">
                			
				<label>Email :</label>
				<input class="input" type="text" name="email" value="" placeholder= <?php echo $_SESSION['login_email'] ?>>
				<span class="error"><?php echo $emailError;?></span>

				<label>Username :</label>
				<input class="input" type="text" name="username" value="" placeholder= <?php echo $_SESSION['login_username'] ?>>
				<span class="error"><?php echo $usernameError;?></span>

				<label>First Name :</label>
				<input class="input" type="text" name="firstName" value="" placeholder= <?php echo $_SESSION['login_firstName'] ?>>
				<!--<span class="error"><?php echo $nameError;?></span>-->

				<label>Last Name :</label>
				<input class="input" type="text" name="lastName" value="" placeholder= <?php echo $_SESSION['login_lastName'] ?>>
				<!--<span class="error"><?php echo $nameError;?></span>-->

				<label>Phone Number :</label>
				<input class="input" type="text" name="phoneNum" value="" placeholder= <?php echo $_SESSION['login_phoneNum'] ?>>
				<!--<span class="error"><?php echo $phoneError;?></span>-->

				<label>Phone Extension :</label>
				<input class="input" type="text" name="phoneExt" value="" placeholder= <?php echo $_SESSION['login_phoneExt'] ?>>
				<!--<span class="error"><?php echo $phoneExtError;?></span>-->

				<label>Year of Graduation :</label>
				<input class="input" type="text" name="gradYr" value="" placeholder= <?php echo $_SESSION['login_gradYr'] ?>>
				<!--<span class="error"><?php echo $gradYrError;?></span>-->

				<label>Faculty :</label>
				<input class="input" type="text" name="faculty" value="" placeholder= <?php echo $_SESSION['login_faculty'] ?>>
				<!--<span class="error"><?php echo $facultyError;?></span>-->

				<label>Degree :</label>
				<input class="input" type="text" name="degree" value="" placeholder= <?php echo $_SESSION['login_degree'] ?>>
				<!--<span class="error"><?php echo $nameError;?></span>-->
			</div>
			
			<div class="button-centre">
				<input class="submit" type="submit" name="submit" value="Submit">
				<!--<span class="error"><?php echo $error;?></span>-->
				<!--<span class="success"><?php echo $successMessage;?></span>-->
			</div>
		</form>

</div>
</body>
</html>
