
<?php
include('login.php'); // Includes Login Script

if(isset($_SESSION['login_user'])){
header("location: homepage.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Login Form in PHP with Session</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
	<?php include_once 'header.php';?>
	<div id="main">
		<div id="login">
            <div class="container">
			<div class="main">  
                <h2>Login</h2>
			    <form action="" method="post">
				    <label>UserName :</label>
				    <input id="name" name="username" placeholder="username" type="text">
				    <label>Password :</label>
				    <input id="password" name="password" placeholder="**********" type="password">
			    	<input name="submit" type="submit" value=" Login ">
				    <span><?php echo $error; ?></span>
			    </form>
                <p>Don't have an account? <a href="register_page.php">Register</a></p>
            </div>
            </div>  
		</div>
	</div>
</body>
</html>