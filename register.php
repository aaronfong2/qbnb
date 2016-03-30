<?php

$connection = mysql_connect("localhost", "root", "");
$db = mysql_select_db("qbnb", $connection);

$passwordError=''; // Variable To Store Error Message
$usernameError='';
$emailError='';
$requiredFNError='';
$requiredLNError='';
$requiredPNError='';
$error=0;

if (isset($_POST['submit'])) {

	//email
	if (empty($_POST['email'])){
		$emailError='Email is required';
		$error=1;

	}else{
		$query = mysql_query("select * from users where users.email='".$_POST['email']."'", $connection);
		$rows = mysql_num_rows($query);

		if($rows!==0){ //Check that the email is not already used
				$emailError = "Email is already registered";
				$error=1;
		}
	}

	//username
	if (empty($_POST['username'])){
		$usernameError='Username is required';
		$error=1;

	}else{
		$query = mysql_query("select * from users where users.username='".$_POST['username']."'", $connection);
		$rows = mysql_num_rows($query);

		if($rows!==0){ //Check that the email is not already used
				$usernameError = "Username is already registered";
				$error=1;
		}
	}


	//password
	if (empty($_POST['PW']) || empty($_POST['repeatPW'])) {
		$passwordError = "You must type your password twice";
		$error=1;
	}elseif($_POST['PW']!==$_POST['repeatPW']){
		$passwordError = "The passwords do not match";
		$error=1;
	}
	

	//first name
	if (empty($_POST['first_name'])){
		$requiredFNError='First name is required';
		$error=1;

	}

	//last name
	if (empty($_POST['last_name'])){
		$requiredLNError='Last name is required';
		$error=1;
	}
	//Phone number
	if (empty($_POST['phone_num'])){
		$requiredPNError='Phone number is required';
		$error=1;
	}

}


if(isset($_POST['submit']) && $error==0){


	mysql_query("INSERT INTO `users` (`userID`, `is_admin`, `username`, `password`, `first_name`, `last_name`, `email`, `phone_num`, `phone_ext`, `grad_year`, `faculty`, `degree`, `is_active`) VALUES (NULL, '0', '".$_POST['username']."','".$_POST['PW']."','".$_POST['first_name']."','".$_POST['last_name']."','".$_POST['email']."','".$_POST['phone_num']."', NULL, NULL, NULL, NULL, '1')");

	mysql_close($connection); // Closing Connection
	
	header("Location: index.php");
}
?>